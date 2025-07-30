<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['book', 'member']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('book', function($book) use ($search) {
                    $book->where('title', 'like', "%{$search}%");
                })->orWhereHas('member', function($member) use ($search) {
                    $member->where('name', 'like', "%{$search}%");
                });
            });
        }

        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'terlambat') {
                $query->where(function($q) {
                    $q->where('status', 'terlambat')
                      ->orWhere(function($subQ) {
                          $subQ->where('status', 'dipinjam')
                               ->where('due_date', '<', Carbon::now());
                      });
                });
            } else {
                $query->where('status', $request->status);
            }
        }

        $borrowings = $query->orderBy('created_at', 'desc')->paginate(10);

        // Update terlambat status
        Borrowing::where('status', 'dipinjam')
            ->where('due_date', '<', Carbon::now())
            ->update(['status' => 'terlambat']);

        return view('dashboard.borrowing.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('available_stock', '>', 0)->get();
        $members = Member::where('status', 'active')->get();
        return view('dashboard.borrowing.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'notes' => 'nullable|string'
        ]);

        $book = Book::find($validated['book_id']);
        
        if ($book->available_stock <= 0) {
            return redirect()->back()->with('error', 'Book is not available for borrowing!');
        }

        // Check if member has reached borrowing limit
        $activeBorrowings = Borrowing::where('member_id', $validated['member_id'])
            ->whereIn('status', ['dipinjam', 'terlambat'])
            ->count();

        if ($activeBorrowings >= 5) { // Assuming max 5 books per member
            return redirect()->back()->with('error', 'Member has reached maximum borrowing limit!');
        }

        Borrowing::create($validated);

        return redirect()->route('borrowing.index')->with('success', 'Borrowing record created successfully!');
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['book', 'member']);
        return view('dashboard.borrowing.show', compact('borrowing'));
    }

    public function returnBook(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'return_date' => 'required|date',
            'condition' => 'required|in:sangat baik,baik,cukup,buruk,rusak',
            'notes' => 'nullable|string'
        ]);

        $borrowing->markAsReturned($validated['condition'], $validated['notes']);
        $borrowing->return_date = $validated['return_date'];
        $borrowing->save();

        return redirect()->route('borrowing.index')->with('success', 'Book dikembalikan successfully!');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'dikembalikan') {
            return redirect()->route('borrowing.index')->with('error', 'Cannot delete active borrowing record!');
        }

        $borrowing->delete();

        return redirect()->route('borrowing.index')->with('success', 'Borrowing record deleted successfully!');
    }
}