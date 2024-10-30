<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-200 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

<!-- Navigation Bar -->
<nav class="bg-blue-50 shadow-md dark:bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex space-x-4">
            <a href="{{ url(route('home')) }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">Home</a>
            <a href="{{ url(route('gods.index')) }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">Gods</a>
        </div>

        <div class="flex space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="/profile" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">Profile</a>
                    <a href="{{ url('/dashboard') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">
                        Dashboard
                    </a>
                    @if(\Auth::user()->admin)
                        <a href="{{ route('admin.index') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">Admin Dash</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-100 hover:text-gray-500 dark:hover:text-gray-300">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="container mx-auto p-6 bg-blue-100 dark:bg-gray-800 shadow-lg mt-6 rounded-lg">
    {{ $slot }}
</main>
</body>
</html>
