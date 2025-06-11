<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $characters = Character::orderBy('order')->get();
        return view('admin.characters.index', compact('characters'));
    }

    public function create()
    {
        return view('admin.characters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/characters'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        
        Character::create($validated);

        return redirect()->route('admin.characters.index')
            ->with('success', 'Character created successfully.');
    }

    public function edit(Character $character)
    {
        return view('admin.characters.edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if (file_exists(public_path('images/characters/' . $character->image))) {
                unlink(public_path('images/characters/' . $character->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/characters'), $imageName);
            $validated['image'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        
        $character->update($validated);

        return redirect()->route('admin.characters.index')
            ->with('success', 'Character updated successfully.');
    }

    public function destroy(Character $character)
    {
        // Delete image
        if (file_exists(public_path('images/characters/' . $character->image))) {
            unlink(public_path('images/characters/' . $character->image));
        }
        
        $character->delete();

        return redirect()->route('admin.characters.index')
            ->with('success', 'Character deleted successfully.');
    }
}