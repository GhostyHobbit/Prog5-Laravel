<x-layout>
    <div class="flex flex-col items-center justify-center h-80 p-4 bg-blue-50 dark:bg-gray-800 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-4">Attention</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 text-center">
            You need to have three posts created before you can delete this.
        </p>
        <a href="{{ url(route('gods.index')) }}" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Go Back
        </a>
    </div>
</x-layout>

