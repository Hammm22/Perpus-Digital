<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Perpus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-lg border border-gray-800">

    <h1 class="text-3xl font-bold mb-6 text-center">Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <input 
            type="email" 
            name="email" 
            placeholder="Email"
            class="w-full mb-4 p-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
            required
        >

        <!-- Password -->
        <input 
            type="password" 
            name="password" 
            placeholder="Password"
            class="w-full mb-6 p-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
            required
        >

        <!-- Button -->
        <button class="w-full bg-white text-black py-3 rounded-lg font-semibold hover:opacity-90 transition">
            Login
        </button>

    </form>

    <!-- Register link -->
    <p class="text-center text-gray-400 mt-4">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="text-white hover:underline">
            Register
        </a>
    </p>

</div>

</body>
</html>