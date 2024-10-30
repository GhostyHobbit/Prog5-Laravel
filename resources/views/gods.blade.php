<x-layout >
    <h1>Gods overview</h1>
    @if (Route::has('login'))
        @auth
            <a href="{{ url(route('gods.create')) }}">Add new God</a>
        @else
            <p>Log in to add your own!</p>
        @endauth
    @endif

    <form action="{{ url(route('gods.index')) }}" method="GET">
        @csrf
        <label for="tags[]">Filter by tags</label>
        <select id="tags[]" name="tags[]" multiple>
            <option value="null" selected>No filter</option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

    <form action="{{ url(route('gods.index')) }}" method="GET">
        @csrf
        <label for="search">Filter on search</label>
        <input id="search" name="search" placeholder="Search"/>
        <button type="submit">Search</button>
    </form>

    @foreach($gods as $god)
        @if($god->active)
            <x-gods :god="$god"/>
        @endif
    @endforeach
</x-layout>
