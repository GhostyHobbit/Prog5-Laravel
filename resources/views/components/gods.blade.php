@props(['god'])

<article class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 mb-6 transition-transform transform hover:scale-105">
    <h2 class="text-xl font-bold text-gold dark:text-beige-light mb-2">{{ $god->name }}</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Description:</strong> {{ $god->description }}</p>
    <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Domain:</strong> {{ $god->domain }}</p>
    <p class="text-gray-700 dark:text-gray-300 mb-4"><strong>Pantheon:</strong> {{ $god->pantheon }}</p>
    <a href="gods/{{ $god->id }}" class="rounded-md px-3 py-1 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">Details</a>
</article>

