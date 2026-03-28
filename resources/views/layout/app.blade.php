<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpus Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white">

   <nav class="px-6 py-4 border-b border-gray-800 bg-gray-950/80 backdrop-blur-md sticky top-0 z-50">
    
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        
        <!-- Logo -->
        <a href="/" class="text-lg font-semibold tracking-tight">
            Perpus
        </a>

        <!-- Menu -->
        <div class="flex items-center gap-6 text-sm">

            <a href="/" class="text-gray-400 hover:text-white transition">
                Home
            </a>

            @auth
                <a href="/admin/books" class="text-gray-400 hover:text-white transition">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-400 hover:text-red-300 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="text-gray-400 hover:text-white transition">
                    Login
                </a>
            @endauth

        </div>

    </div>

</nav>

    <div class="p-6 max-w-6xl mx-auto">
        @yield('content')
    </div>
</body>

</html>