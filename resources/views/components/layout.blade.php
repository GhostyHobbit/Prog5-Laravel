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
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

<!-- Navigation Bar -->
<nav class="bg-white shadow-md dark:bg-gray-800 p-4">
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
                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg mt-6 rounded-lg">
    {{ $slot }}
</main>
</body>
</html>

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <nav>--}}
{{--        <a href="{{ url(route('home')) }}">Home</a>--}}
{{--        <a href="{{ url(route('gods.index')) }}">Gods</a>--}}
{{--        @if (Route::has('login'))--}}
{{--                @auth--}}
{{--                    <a href="/profile">Profile</a>--}}
{{--                    <a--}}
{{--                        href="{{ url('/dashboard') }}"--}}
{{--                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
{{--                    >--}}
{{--                        Dashboard--}}
{{--                    </a>--}}
{{--                @if(\Auth::user()->admin)--}}
{{--                    <a href="{{ route('admin.index') }}">Admin Dash</a>--}}
{{--                @endif--}}
{{--                @else--}}
{{--                    <a--}}
{{--                        href="{{ route('login') }}"--}}
{{--                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
{{--                    >--}}
{{--                        Log in--}}
{{--                    </a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a--}}
{{--                            href="{{ route('register') }}"--}}
{{--                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
{{--                        >--}}
{{--                            Register--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--        @endif--}}
{{--    </nav>--}}
{{--<main>--}}
{{--    {{ $slot }}--}}
{{--</main>--}}
{{--</body>--}}
{{--</html>--}}
