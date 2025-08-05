@extends('layouts.app')

@section('title', 'Kelola Perpus')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold tracking-tight">Dashboard</h1>
    </div>

    <!-- Stats cards -->
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white rounded-lg border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Buku</p>
                    <p class="text-2xl font-bold">{{ $totalBooks }}</p>
                </div>
                <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-blue-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Buku yang dipinjam</p>
                    <p class="text-2xl font-bold">{{ $booksBorrowed }}</p>
                </div>
                <div class="h-12 w-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-bookmark text-emerald-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Buku yang Telat</p>
                    <p class="text-2xl font-bold">{{ $overdueBooks }}</p>
                </div>
                <div class="h-12 w-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-red-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Anggota Aktif</p>
                    <p class="text-2xl font-bold">{{ $activeMembers }}</p>
                </div>
                <div class="h-12 w-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Status -->
    <div class="grid gap-4 md:grid-cols-2">
        <div class="bg-white rounded-lg border p-6">
            <h3 class="text-lg font-semibold mb-4">Status Buku</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-emerald-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-emerald-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Yang Tersedia</p>
                        <p class="text-xl font-bold">{{ $bookStatus['available'] }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-bookmark text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Dipinjam</p>
                        <p class="text-xl font-bold">{{ $bookStatus['dipinjam'] }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">Telat</p>
                        <p class="text-xl font-bold">{{ $bookStatus['terlambat'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg border p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Aktifitas Terkini</h3>
                <a href="{{ route('borrowing.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">
                    Lihat semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-3">
                @forelse($recentActivity as $activity)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="h-8 w-8 bg-{{ $activity->status == 'dikembalikan' ? 'emerald' : ($activity->status == 'terlambat' ? 'red' : 'blue') }}-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-{{ $activity->status == 'dikembalikan' ? 'check' : 'bookmark' }} text-{{ $activity->status == 'dikembalikan' ? 'emerald' : ($activity->status == 'terlambat' ? 'red' : 'blue') }}-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">{{ $activity->book->title }}</p>
                            <p class="text-xs text-gray-500">{{ $activity->member->name }} • {{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full bg-{{ $activity->status == 'dikembalikan' ? 'emerald' : ($activity->status == 'terlambat' ? 'red' : 'blue') }}-100 text-{{ $activity->status == 'dikembalikan' ? 'emerald' : ($activity->status == 'terlambat' ? 'red' : 'blue') }}-600">
                            {{ ucfirst($activity->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">Tak ada aktivitas terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection