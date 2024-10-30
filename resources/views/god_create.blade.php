<x-layout>
    <h1 class="text-3xl font-bold mb-6">Add New God</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url(route('gods.store')) }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-semibold text-gray-700 dark:text-gray-300">Name</label>
            <input id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500" required />
        </div>

        <div>
            <label for="description" class="block font-semibold text-gray-700 dark:text-gray-300">Description</label>
            <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500" required></textarea>
        </div>

        <div>
            <label for="domain" class="block font-semibold text-gray-700 dark:text-gray-300">Domain</label>
            <textarea id="domain" name="domain" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500" required></textarea>
        </div>

        <div>
            <label for="pantheon" class="block font-semibold text-gray-700 dark:text-gray-300">Pantheon</label>
            <input id="pantheon" name="pantheon" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500" required />
        </div>

        <div>
            <label for="tags[]" class="block font-semibold text-gray-700 dark:text-gray-300">Tags</label>
            <select id="tags[]" name="tags[]" multiple class="mt-1 block w-full border border-gray-300 rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Save
        </button>
    </form>
</x-layout>


{{--<x-layout>--}}
{{--    <h1>Add new God</h1>--}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form action="{{ url(route('gods.store')) }}" method="POST">--}}
{{--        @csrf--}}
{{--        <label for="name">Name</label>--}}
{{--        <input id="name" name="name"/>--}}

{{--        <label for="description">Description</label>--}}
{{--        <textarea id="description" name="description"></textarea>--}}

{{--        <label for="domain">Domain</label>--}}
{{--        <textarea id="domain" name="domain"></textarea>--}}

{{--        <label for="pantheon">Pantheon</label>--}}
{{--        <input id="pantheon" name="pantheon">--}}

{{--        <label for="tags[]">Tags</label>--}}
{{--        <select id="tags[]" name="tags[]" multiple>--}}
{{--            @foreach($tags as $tag)--}}
{{--                <option value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

{{--        <button type="submit">Save</button>--}}
{{--    </form>--}}
{{--</x-layout>--}}
