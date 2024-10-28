<x-layout >
    <h1>Gods overview</h1>
    @if (Route::has('login'))
        @auth
            <a href="{{ url(route('gods.create')) }}">Add new God</a>
        @else
            <p>Log in to add your own!</p>
        @endauth
    @endif

    @foreach($gods as $god)
        @if($god->active)
            <x-gods :god="$god"/>
        @endif
    @endforeach
</x-layout>
