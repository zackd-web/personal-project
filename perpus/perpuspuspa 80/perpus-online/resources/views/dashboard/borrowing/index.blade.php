@extends('layouts.app')

@section('title', 'Catatan Peminjaman - Perpustakaan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold tracking-tight">Catatan Peminjaman</h1>
        <a href="{{ route('borrowing.create') }}" class="inline-flex items-center gap-2 bg-emerald-600 text-white px-4 py-2 rounded-md hover:bg-emerald-700">
            <i class="fas fa-plus"></i>
            Peminjaman Baru
        </a>
    </div>

    <!-- Tabs and search -->
    <div class="space-y-4">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex border-b">
                <a href="{{ route('borrowing.index') }}" class="px-4 py-2 text-sm font-medium {{ !request('status') ? 'border-b-2 border-emerald-500 text-emerald-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Semua Catatan
                </a>
                <a href="{{ route('borrowing.index', ['status' => 'dipinjam']) }}" class="px-4 py-2 text-sm font-medium {{ request('status') == 'dipinjam' ? 'border-b-2 border-emerald-500 text-emerald-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Dipinjam
                </a>
                <a href="{{ route('borrowing.index', ['status' => 'dikembalikan']) }}" class="px-4 py-2 text-sm font-medium {{ request('status') == 'dikembalikan' ? 'border-b-2 border-emerald-500 text-emerald-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Dikembalikan
                </a>
                <a href="{{ route('borrowing.index', ['status' => 'terlambat']) }}" class="px-4 py-2 text-sm font-medium {{ request('status') == 'terlambat' ? 'border-b-2 border-emerald-500 text-emerald-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Melebihi Tenggat Waktu
                </a>
            </div>
            <form method="GET" class="flex gap-2">
                <input type="hidden" name="status" value="{{ request('status') }}">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari buku atau peminjam..."
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 min-w-[250px]">
                </div>
                <button type="submit" class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200">
                    <i class="fas fa-search"></i>
                    Cari
                </button>
            </form>
        </div>

        <!-- Borrowing table -->
        <div class="bg-white rounded-lg border overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peminjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal dipinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengembalian</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($borrowings as $borrowing)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($borrowing->book->cover_image)
                                        <img src="{{($borrowing->book->cover_image) }}" alt="{{ $borrowing->book->title }}" class="h-12 w-8 object-cover rounded border">
                                    @else
                                        <div class="h-12 w-8 bg-gray-200 rounded border flex items-center justify-center">
                                            <i class="fas fa-book text-gray-400 text-xs"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $borrowing->book->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $borrowing->book->author }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $borrowing->member->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $borrowing->borrow_date->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $borrowing->due_date->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $borrowing->return_date ? $borrowing->return_date->format('M d, Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-{{ $borrowing->status == 'dikembalikan' ? 'emerald' : ($borrowing->status == 'terlambat' ? 'red' : 'blue') }}-100 text-{{ $borrowing->status == 'dikembalikan' ? 'emerald' : ($borrowing->status == 'terlambat' ? 'red' : 'blue') }}-600">
                                        {{ ucfirst($borrowing->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        @if($borrowing->status !== 'dikembalikan')
                                            <button onclick="openReturnModal({{ $borrowing->id }}, '{{ $borrowing->book->title }}', '{{ $borrowing->member->name }}')" 
                                                    class="text-emerald-600 hover:text-emerald-900">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        @endif
                                        @if($borrowing->status === 'dikembalikan')
                                            <a href="{{ route('borrowing.show', $borrowing) }}" class="text-blue-600 hover:text-blue-900">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                    Tak ada catatan peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing {{ $borrowings->firstItem() ?? 0 }} to {{ $borrowings->lastItem() ?? 0 }} of {{ $borrowings->total() }} records
            </div>
            {{ $borrowings->links() }}
        </div>
    </div>
</div>

<!-- Return Book Modal -->
<div id="returnModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
            <h3 class="text-lg font-semibold mb-4">Pengembalian Buku</h3>
            <form id="returnForm" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600">Buku: <span id="modalBookTitle" class="font-medium"></span></p>
                        <p class="text-sm text-gray-600">Peminjam: <span id="modalBorrower" class="font-medium"></span></p>
                    </div>
                    <div>
                        <label for="return_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kembali</label>
                        <input type="date" id="return_date" name="return_date" value="{{ date('Y-m-d') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                    <div>
                        <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Kondisi Buku</label>
                        <select id="condition" name="condition" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                            <option value="sangat baik">Bagus</option>
                            <option value="buruk">Kotor</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                        <input type="text" id="notes" name="notes" placeholder="Beri catatan jika perlu"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    </div>
                </div>
                <div class="flex items-center gap-4 mt-6">
                    <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded-md hover:bg-emerald-700">
                       Konfirmasi
                    </button>
                    <button type="button" onclick="closeReturnModal()" class="text-gray-600 hover:text-gray-900">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openReturnModal(borrowingId, bookTitle, borrower) {
    document.getElementById('modalBookTitle').textContent = bookTitle;
    document.getElementById('modalBorrower').textContent = borrower;
    document.getElementById('returnForm').action = `/borrowing/${borrowingId}/return`;
    document.getElementById('returnModal').classList.remove('hidden');
}

function closeReturnModal() {
    document.getElementById('returnModal').classList.add('hidden');
}
</script>
@endsection