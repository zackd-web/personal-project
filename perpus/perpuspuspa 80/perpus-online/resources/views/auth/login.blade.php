<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Puspa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('books.png')}}" title="books icons">
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md">
            <div class="p-6 space-y-4">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{asset('grid-gallery/puspa.png')}}" style="height: 100px; width: 100px; " alt="">
                    </div>
                    <h1 class="text-2xl font-bold mb-2">Perpustakaan Puspa</h1>
                    <p class="text-gray-600">Masukkan Email dan Password</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                               placeholder="admin@lmao.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                               placeholder="••••••••">
                    </div>
                    <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                        Masuk
                    </button>
                </form>

                <div class="text-center text-sm text-gray-500">
                    <a href="{{route('main')}}">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>