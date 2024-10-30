<x-layout>
    <div class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <!-- Page Heading -->
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Welcome to the Admin Dashboard</h1>

        <!-- Table Title -->
        <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-4">God Posts</h2>

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
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
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300">
                        <td class="px-4 py-3 border-b">{{ $god->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->description }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->domain }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->pantheon }}</td>
                        <td class="px-4 py-3 border-b">{{ $god->user->name }}</td>
                        <td class="px-4 py-3 border-b">
                            <form action="{{ url(route('admin.toggle', $god->id)) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition">
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
        </div>
    </div>
</x-layout>


{{--<x-layout>--}}
{{--    <h1>Welcome to the Admin Dashboard</h1>--}}
{{--    <h2>God Posts</h2>--}}
{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>Name</th>--}}
{{--            <th>Description</th>--}}
{{--            <th>Domain</th>--}}
{{--            <th>Pantheon</th>--}}
{{--            <th>Created By</th>--}}
{{--            <th>Active</th>--}}
{{--        </tr>--}}
{{--    @foreach($gods as $god)--}}
{{--        <tr>--}}
{{--            <th>{{ $god->name }}</th>--}}
{{--            <th>{{ $god->description }}</th>--}}
{{--            <th>{{ $god->domain }}</th>--}}
{{--            <th>{{ $god->pantheon }}</th>--}}
{{--            <th>{{ $god->user->name }}</th>--}}
{{--            <th>--}}
{{--                <form action="{{ url(route('admin.toggle', $god->id)) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <button type="submit">--}}
{{--                        @if($god->active)--}}
{{--                            Active--}}
{{--                        @else--}}
{{--                            Not active--}}
{{--                        @endif--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </th>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </table>--}}
{{--</x-layout>--}}
