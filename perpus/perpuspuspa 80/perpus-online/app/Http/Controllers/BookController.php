<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhereHas('category', function($cat) use ($search) {
                      $cat->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $books = $query->paginate(10);
        $categories = Category::all();

        return view('dashboard.books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'description' => 'nullable|string',
            'total_copies' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('covers'), $filename);
            $validated['cover_image'] = 'covers/' . $filename;
        }

        $validated['available_stock'] = $validated['total_copies'];

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        $book->load('category', 'borrowings.member');
        return view('dashboard.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('dashboard.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1000|max:' . date('Y'),
            'description' => 'nullable|string',
            'total_copies' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }


        // Validasi agar total_copies tidak lebih kecil dari yang sedang dipinjam
        $borrowedCount = $book->borrowings()->whereIn('status', ['dipinjam', 'terlambat'])->count();

        if ($validated['total_copies'] < $borrowedCount) {
            return redirect()->back()->with('error', 'Total salinan tidak boleh lebih kecil dari jumlah buku yang sedang dipinjam!');
        }

        $book->update($validated);
        $book->updateStock(); // Panggil method di model Book agar stock tetap sinkron

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        if ($book->activeBorrowings()->count() > 0) {
            return redirect()->route('books.index')->with('error', 'Cannot delete book with active borrowings!');
        }

        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}