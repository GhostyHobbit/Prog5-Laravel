<x-layout>
    <div class="container mx-auto p-6 bg-blue-50 dark:bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4">{{ $god->name }}</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-2">{{ $god->description }}</p>
        <p class="mt-4 text-gray-600 dark:text-gray-300 font-bold">Domain:</p>
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-2">{{ $god->domain }}</p>

        <div class="mb-4">
            @foreach($god->tags as $tag)
                <span class="inline-block bg-blue-300 text-gray-800 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">{{ $tag->title }}</span>
            @endforeach
        </div>


        <p class="text-lg text-gray-600 dark:text-gray-300 mb-2">Worshipped by <span class="font-semibold">{{ $god->user->name }}</span></p>

        @auth
            @if(\Auth::user()->id === $god->user->id)
                <div class="mt-4">
                    <a href="{{ url(route('gods.edit', $god->id)) }}" class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition">Edit</a>
                    <a href="{{ url(route('gods.delete', $god->id)) }}" class="ml-4 text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 transition">Delete</a>
                </div>
            @elseif(\Auth::user()->admin)
                <p class="mt-4 text-gray-600 dark:text-gray-300 font-bold">Admin Access:</p>
                <div class="mt-2">
                    <a href="{{ url(route('gods.edit', $god->id)) }}" class="text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition">Edit</a>
                    <a href="{{ url(route('gods.delete', $god->id)) }}" class="ml-4 text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 transition">Delete</a>
                </div>
            @endif
        @endauth
    </div>
</x-layout>

