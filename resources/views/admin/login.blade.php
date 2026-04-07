<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-r from-red-500 to-indigo-600 h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-2xl shadow-lg w-96">

    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Login Admin</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login/admin" class="space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

        <input type="password" name="password" placeholder="Password"
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition">
            Login
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Login sebagai user? 
        <a href="/login " class="text-blue-500">Klik disini</a>
    </p>

</div>

</body>
</html>