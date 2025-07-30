<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(10);

        return view('dashboard.members.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'join_date' => 'required|date'
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function show(Member $member)
    {
        $member->load(['borrowings.book']);
        return view('dashboard.members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('dashboard.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    public function destroy(Member $member)
    {
        if ($member->activeBorrowings()->count() > 0) {
            return redirect()->route('members.index')->with('error', 'Cannot delete member with active borrowings!');
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}