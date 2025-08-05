@extends('layouts.app')

@section('title', $book->title . ' - Perpustakaan')

@section('content')
<div class="space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('books.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-2xl font-bold tracking-tight">Detail Buku</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Book Information -->
        <div class="lg:col-span-2 bg-white rounded-lg border p-6">
            <div class="flex gap-6">
                <div class="flex-shrink-0">
                    @if($book->cover_image)
                             <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}" class="h-48 w-32 object-cover rounded border">
                    @else
                        <div class="h-48 w-32 bg-gray-200 rounded border flex items-center justify-center">
                            <i class="fas fa-book text-gray-400 text-2xl"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $book->title }}</h2>
                    <p class="text-lg text-gray-600 mb-4">by {{ $book->author }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Penerbit</p>
                            <p class="text-sm text-gray-900">{{ $book->publisher }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Tahun diterbitkan</p>
                            <p class="text-sm text-gray-900">{{ $book->year }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Kategori</p>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ $book->category->name }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Stok Buku</p>
                            <p class="text-sm text-gray-900">{{ $book->available_stock }}/{{ $book->total_copies }} available</p>
                        </div>
                    </div>

                    @if($book->description)
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-2">Deskripsi Buku</p>
                            <p class="text-sm text-gray-700">{{ $book->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('books.edit', $book) }}" class="bg-emerald-600 text-white px-4 py-2 rounded-md hover:bg-emerald-700">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Buku
                </a>
                <form method="POST" action="{{ route('books.destroy', $book) }}" class="inline" 
                      onsubmit="return confirm('Are you sure you want to delete this book?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Buku
                    </button>
                </form>
            </div>
        </div>

        <!-- Borrowing History -->
        <div class="bg-white rounded-lg border p-6">
            <h3 class="text-lg font-semibold mb-4"> Histori Peminjaman</h3>
            <div class="space-y-3">
                @forelse($book->borrowings()->latest()->limit(10)->get() as $borrowing)
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm font-medium">{{ $borrowing->member->name }}</p>
                            <span class="px-2 py-1 text-xs rounded-full bg-{{ $borrowing->status == 'returned' ? 'emerald' : ($borrowing->status == 'overdue' ? 'red' : 'blue') }}-100 text-{{ $borrowing->status == 'returned' ? 'emerald' : ($borrowing->status == 'overdue' ? 'red' : 'blue') }}-600">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </div>
                        <div class="text-xs text-gray-500">
                            <p>Borrowed: {{ $borrowing->borrow_date->format('M d, Y') }}</p>
                            <p>Due: {{ $borrowing->due_date->format('M d, Y') }}</p>
                            @if($borrowing->return_date)
                                <p>Returned: {{ $borrowing->return_date->format('M d, Y') }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Tak ada histori peminjaman</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection