<x-layout>
    <div class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <!-- Page Heading -->
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Gods Overview</h1>

        <!-- Add New God Button or Login Message -->
        @if (Route::has('login'))
            @auth
                <a href="{{ url(route('gods.create')) }}" class="rounded-md px-3 py-1 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">
                    Add New God
                </a>
            @else
                <p class="mb-4 text-gray-600 dark:text-gray-300">Log in to add your own!</p>
            @endauth
        @endif

        <!-- Filter by Tags Form -->
        <form action="{{ url(route('gods.index')) }}" method="GET" class="mb-6">
            @csrf
            <label for="tags[]" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Filter by Tags</label>
            <select id="tags[]" name="tags[]" multiple class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary focus:border-primary bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                <option value="null" selected>No filter</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-md px-3 py-1 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">Filter</button>
        </form>

        <!-- Search Form -->
        <form action="{{ url(route('gods.index')) }}" method="GET" class="mb-6">
            @csrf
            <label for="search" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Filter on Search</label>
            <input id="search" name="search" placeholder="Search" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-primary focus:border-primary bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200"/>
            <button type="submit" class="rounded-md px-3 py-1 text-gray-800 bg-gray-200 dark:bg-gray-700 dark:text-gray-100 ring-1 ring-transparent transition hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus-visible:ring-[#FF2D20]">Search</button>
        </form>

        <!-- List of Gods -->
        <div class="container mx-auto p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($gods as $god)
                    @if($god->active)
                        <x-gods :god="$god"/>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layout>


{{--<x-layout >--}}
{{--    <h1>Gods overview</h1>--}}
{{--    @if (Route::has('login'))--}}
{{--        @auth--}}
{{--            <a href="{{ url(route('gods.create')) }}">Add new God</a>--}}
{{--        @else--}}
{{--            <p>Log in to add your own!</p>--}}
{{--        @endauth--}}
{{--    @endif--}}

{{--    <form action="{{ url(route('gods.index')) }}" method="GET">--}}
{{--        @csrf--}}
{{--        <label for="tags[]">Filter by tags</label>--}}
{{--        <select id="tags[]" name="tags[]" multiple>--}}
{{--            <option value="null" selected>No filter</option>--}}
{{--            @foreach($tags as $tag)--}}
{{--                <option value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <button type="submit">Filter</button>--}}
{{--    </form>--}}

{{--    <form action="{{ url(route('gods.index')) }}" method="GET">--}}
{{--        @csrf--}}
{{--        <label for="search">Filter on search</label>--}}
{{--        <input id="search" name="search" placeholder="Search"/>--}}
{{--        <button type="submit">Search</button>--}}
{{--    </form>--}}

{{--    @foreach($gods as $god)--}}
{{--        @if($god->active)--}}
{{--            <x-gods :god="$god"/>--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--</x-layout>--}}
