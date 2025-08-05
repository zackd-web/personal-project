{{-- resources/views/borrowings/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Peminjaman -  Perpustakaan')

@section('content')
<div class="space-y-6">
    {{-- Header & Back Button --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Detail Peminjaman</h1>
        <a href="{{ route('borrowing.index') }}" class="inline-flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Card --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
            {{-- Cover --}}
            <div class="flex justify-center items-center">
                @if($borrowing->book->cover_image)
                    <img src="{{asset($borrowing->book->cover_image) }}" alt="{{ $borrowing->book->title }}" class="h-48 w-32 object-cover rounded border">
                @else
                    <div class="h-48 w-32 bg-gray-100 rounded border flex items-center justify-center">
                        <i class="fas fa-book text-gray-400 text-2xl"></i>
                    </div>
                @endif
            </div>

            {{-- Book & Member Info --}}
            <div class="space-y-2">
                <div>
                    <h2 class="text-lg font-semibold">{{ $borrowing->book->title }}</h2>
                    <p class="text-sm text-gray-600">{{ $borrowing->book->author }}</p>
                </div>
                <div>
                    <h3 class="font-medium">Peminjam</h3>
                    <p class="text-gray-700">{{ $borrowing->member->name }}</p>
                    <p class="text-gray-500 text-sm">{{ $borrowing->member->email ?? '' }}</p>
                </div>
                <div>
                    <h3 class="font-medium">Status</h3>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                        bg-{{ $borrowing->status == 'dikembalikan' ? 'emerald' : ($borrowing->status == 'terlambat' ? 'red' : 'blue') }}-100 
                        text-{{ $borrowing->status == 'dikembalikan' ? 'emerald' : ($borrowing->status == 'terlambat' ? 'red' : 'blue') }}-600">
                        {{ ucfirst($borrowing->status) }}
                    </span>
                </div>
            </div>

            {{-- Dates & Condition --}}
            <div class="space-y-4">
                <div>
                    <h3 class="font-medium">Tanggal Dipinjam</h3>
                    <p class="text-gray-900">{{ $borrowing->borrow_date->format('F d, Y') }}</p>
                </div>
                <div>
                    <h3 class="font-medium">Tanggal Pengembalian</h3>
                    <p class="text-gray-900">{{ $borrowing->due_date->format('F d, Y') }}</p>
                </div>
                <div>
                    <h3 class="font-medium">Tanggal Kembali</h3>
                    <p class="text-gray-900">
                        {{ $borrowing->return_date 
                            ? $borrowing->return_date->format('F d, Y') 
                            : '-' }}
                    </p>
                </div>
                @if($borrowing->return_date)
                <div>
                    <h3 class="font-medium">Kondisi</h3>
                    <p class="text-gray-900 capitalize">{{ $borrowing->condition }}</p>
                </div>
                <div>
                    <h3 class="font-medium">Catatan</h3>
                    <p class="text-gray-900">{{ $borrowing->notes ?? '-' }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Actions --}}
    <div class="flex gap-2">
        @if($borrowing->status !== 'dikembalikan')
            <a href="{{ route('borrowing.return.form', $borrowing) }}"
               class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-md hover:bg-emerald-700">
                <i class="fas fa-check-circle"></i> Mark as Returned
            </a>
        @endif
        <form action="{{ route('borrowing.destroy', $borrowing) }}" method="POST" onsubmit="return confirm('Delete this record?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
