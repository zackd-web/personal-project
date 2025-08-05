@extends('layouts.app')

@section('title', 'Peminjaman Baru - Perpustakaan')

@section('content')
<div class="space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('borrowing.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-2xl font-bold tracking-tight">Tambahkan Catatan Peminjaman Baru</h1>
    </div>

    <div class="bg-white rounded-lg border p-6">
        <form method="POST" action="{{ route('borrowing.store') }}" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="book_id" class="block text-sm font-medium text-gray-700 mb-1">Buku *</label>
                    <select id="book_id" name="book_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('book_id') border-red-500 @enderror">
                        <option value="">Pilih buku</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }} - {{ $book->author }} ({{ $book->available_stock }} available)
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="member_id" class="block text-sm font-medium text-gray-700 mb-1">Anggota *</label>
                    <select id="member_id" name="member_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('member_id') border-red-500 @enderror">
                        <option value="">Pilih Anggota</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->name }} - {{ $member->email }}
                            </option>
                        @endforeach
                    </select>
                    @error('member_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="borrow_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal dipinjam *</label>
                    <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('borrow_date') border-red-500 @enderror">
                    @error('borrow_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengembalian *</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+14 days'))) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('due_date') border-red-500 @enderror">
                    @error('due_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                <input type="text" id="notes" name="notes" value="{{ old('notes') }}" placeholder="Any special notes about this borrowing"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 @error('notes') border-red-500 @enderror">
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-emerald-600 text-white px-6 py-2 rounded-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    Buat Catatan
                </button>
                <a href="{{ route('borrowing.index') }}" class="text-gray-600 hover:text-gray-900">
                    Batalkan
                </a>
            </div>
        </form>
    </div>
</div>
@endsection