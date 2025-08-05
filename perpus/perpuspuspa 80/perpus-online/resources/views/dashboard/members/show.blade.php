@extends('layouts.app')

@section('title', $member->name)
@section('header', 'Member Details')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-start mb-6">
        <h3 class="text-lg font-semibold text-gray-800">{{ $member->name }}</h3>
        <div class="flex space-x-2">
            <a href="{{ route('members.edit', $member) }}" class="px-4 py-2 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('members.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Member Details -->
        <div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">ID Keanggotaan</h4>
                        <p class="text-gray-800">{{ $member->id }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Email</h4>
                        <p class="text-gray-800">{{ $member->email }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">No. HP</h4>
                        <p class="text-gray-800">{{ $member->phone ?: 'Not provided' }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Tanggal Bergabung</h4>
                        <p class="text-gray-800">{{ $member->join_date->format('F d, Y') }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Status Anggota</h4>
                        @if($member->status == 'active')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Aktif
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Tidak Aktif
                            </span>
                        @endif
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Alamat</h4>
                        <p class="text-gray-800">{{ $member->address ?: 'Not provided' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Borrowing Summary -->
        <div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h4 class="text-sm font-medium text-gray-500 mb-4">Ringkasan Peminjaman</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="bg-white p-3 rounded-md shadow-sm">
                        <div class="text-sm text-gray-500">Total dipinjam</div>
                        <div class="text-2xl font-semibold text-gray-800">{{ $member->borrowings->count() }}</div>
                    </div>
                    
                    <div class="bg-white p-3 rounded-md shadow-sm">
                        <div class="text-sm text-gray-500">Peminjaman Terbaru</div>
                        <div class="text-2xl font-semibold text-gray-800">{{ $member->activeBorrowings->count() }}</div>
                    </div>
                </div>
                
                <div class="bg-white p-3 rounded-md shadow-sm">
                    <div class="text-sm text-gray-500 mb-2">Buku yang Telat</div>
                    @php
                        $overdueCount = $member->borrowings->where('status', 'terlambat')->count();
                    @endphp
                    
                    @if($overdueCount > 0)
                        <div class="text-red-600 font-medium">{{ $overdueCount }} Buku {{ $overdueCount == 1 ? 'terlambat' : 'books' }}</div>
                    @else
                        <div class="text-green-600 font-medium">Tak ada buku yang terlambat</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Borrowing History -->
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Riwayat Peminjaman</h3>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Peminjaman</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengembalian</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($member->borrowings as $borrowing)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $borrowing->book->title }}</div>
                                <div class="text-sm text-gray-500">{{ $borrowing->book->author }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $borrowing->borrow_date->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $borrowing->due_date->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $borrowing->return_date ? $borrowing->return_date->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($borrowing->status == 'dipinjam')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Sedang Di Pinjam
                                    </span>
                                @elseif($borrowing->status == 'dikembalikan')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Sudah Di Kembalikan
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Terlambat Di Kembalikan
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No borrowing history for this member
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection