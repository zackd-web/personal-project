<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kelola Perpustakaan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('books.png')}}" title="books icons">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden md:flex w-64 flex-col bg-white border-r">
            <div class="flex h-14 items-center border-b px-4">
                <a href="{{ route('main') }}" class="flex items-center gap-2 font-semibold">
                    <img src="{{ asset('shelving.png')}}" alt="logo-perpus" style="width: 40px; height: 40px;">
                    <span>Kelola Perpus Desa Pancur</span>
                </a>
            </div>
            <nav class="flex-1 overflow-auto py-4">
                <div class="px-3 py-2">
                    <h2 class="mb-2 px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Kelola Perpus</h2>
                    <div class="space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-chart-bar w-4"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('books.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('books.*') ? 'bg-emerald-50 text-emerald-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-book w-4"></i>
                            Buku
                        </a>
                        <a href="{{ route('borrowing.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('borrowing.*') ? 'bg-emerald-50 text-emerald-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-bookmark w-4"></i>
                            Peminjaman Buku
                        </a>
                        <a href="{{ route('members.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('members.*') ? 'bg-emerald-50 text-emerald-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-users w-4"></i>
                            Anggota
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex flex-1 flex-col">
            <!-- Header -->
            <header class="flex h-14 items-center gap-4 border-b bg-white px-4 lg:px-6">
                <button class="md:hidden" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="flex-1"></div>
                
                <!-- User menu -->
                <div class="relative">
                    <button class="flex items-center gap-2 rounded-full p-2 hover:bg-gray-100" onclick="toggleUserMenu()">
                        <div class="h-8 w-8 rounded-full bg-emerald-600 flex items-center justify-center text-white text-sm font-medium">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </button>
                    <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border hidden">
                        <div class="py-1">
                            <div class="px-4 py-2 text-sm text-gray-700 border-b">
                                {{ auth()->user()->name }}
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-auto p-4 lg:p-6">
                @if(session('success'))
                    <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile sidebar overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>
    
    <!-- Mobile sidebar -->
    <div id="mobileSidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white transform -translate-x-full transition-transform md:hidden">
        <!-- Same sidebar content as desktop -->
    </div>

    <script>
        function toggleUserMenu() {
            document.getElementById('userMenu').classList.toggle('hidden');
        }

        function toggleSidebar() {
            document.getElementById('mobileSidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        // Close menus when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('userMenu');
            if (!event.target.closest('.relative')) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>