<x-layout>
    <div class="flex flex-col items-center justify-center h-80 p-4 bg-blue-50 dark:bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4">
            Are you sure you want to delete <span class="text-red-600">{{ $god->name }}</span>?
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
            This action cannot be undone.
        </p>
        <form action="{{ url(route('gods.destroy', $god->id)) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">
                DELETE
            </button>
        </form>
        <a href="{{ url(route('gods.index')) }}" class="mt-4 text-gray-600 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400">
            Cancel
        </a>
    </div>
</x-layout>

