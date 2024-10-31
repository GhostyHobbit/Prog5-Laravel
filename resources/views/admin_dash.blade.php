<x-layout>
    <div class="container mx-auto p-6 bg-blue-50 dark:bg-gray-800 shadow-lg rounded-lg">
        <!-- Page Heading -->
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Welcome to the Admin Dashboard</h1>

        <!-- Table Title -->
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">God Posts</h2>

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead>
                <tr class="bg-blue-200 dark:bg-blue-700 text-gray-800 dark:text-gray-300">
                    <th class="px-4 py-2 border-b font-semibold text-left">Name</th>
                    <th class="px-4 py-2 border-b font-semibold text-left">Description</th>
                    <th class="px-4 py-2 border-b font-semibold text-left">Domain</th>
                    <th class="px-4 py-2 border-b font-semibold text-left">Pantheon</th>
                    <th class="px-4 py-2 border-b font-semibold text-left">Created By</th>
                    <th class="px-4 py-2 border-b font-semibold text-left">Active</th>
                </tr>
                </thead>
                <tbody>
                @foreach($gods as $god)
                    <tr class="hover:bg-blue-50 dark:hover:bg-blue-800 text-gray-700 dark:text-gray-300">
                        <td class="px-4 py-3 border-b">{{ $god->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->description }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->domain }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->pantheon }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->user->name }}</td>
                        <td class="px-4 py-3 border-b">
                            <form action="{{ url(route('admin.toggle', $god->id)) }}" method="POST">
                                @csrf
                                <button type="submit" class="rounded-md px-3 py-1 text-gray-800 bg-blue-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-blue-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    @if($god->active)
                                        Active
                                    @else
                                        Not active
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">Tags</h2>
            <a href="{{ route('tags.create') }}" class="rounded-md px-3 py-1 text-gray-800 bg-blue-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-blue-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">Create Tag</a>
            <!-- Data Table -->
            <div class="overflow-x-auto my-2">
                <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg">
                    <thead>
                    <tr class="bg-blue-200 dark:bg-blue-700 text-gray-800 dark:text-gray-300">
                        <th class="px-4 py-2 border-b font-semibold text-left">Tag</th>
                        <th class="px-4 py-2 border-b font-semibold text-left">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr class="hover:bg-blue-50 dark:hover:bg-blue-800 text-gray-700 dark:text-gray-300">
                            <td class="px-4 py-3 border-b">{{ $tag->title }}</td>
                            <td class="px-4 py-3 border-b text-red-600">
                                <form action="{{ url(route('tags.destroy', $tag->id)) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-gray-100 hover:text-red-500 dark:hover:text-gray-300">
                                    Delete
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

