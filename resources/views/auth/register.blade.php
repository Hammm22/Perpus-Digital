<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Perpus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-lg border border-gray-800">

    <h1 class="text-3xl font-bold mb-6 text-center">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Name"
            class="w-full mb-4 p-3 bg-gray-800 rounded-lg" required>

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-4 p-3 bg-gray-800 rounded-lg" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-3 bg-gray-800 rounded-lg" required>

        <input type="password" name="password_confirmation" placeholder="Confirm Password"
            class="w-full mb-6 p-3 bg-gray-800 rounded-lg" required>

        <button class="w-full bg-white text-black py-3 rounded-lg font-semibold">
            Register
        </button>
    </form>

    <p class="text-center text-gray-400 mt-4">
        Sudah punya akun? 
        <a href="{{ route('login') }}" class="text-white hover:underline">
            Login
        </a>
    </p>

</div>

</body>
</html>