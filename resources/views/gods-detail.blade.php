<x-layout>
    <h1>{{$god->name}}</h1>
    <p>Worshipped by {{ $god->user->name }}</p>
    @foreach($god->tags as $tag)
        <p>{{ $tag->title }}</p>
    @endforeach

    @auth
        @if(\Auth::user()->id === $god->user->id)
            <a href="{{ url(route('gods.edit', $god->id)) }}">Edit</a>
            <a href="{{ url(route('gods.delete', $god->id)) }}">Delete</a>
        @elseif(\Auth::user()->admin)
            <p>Admin:</p>
            <a href="{{ url(route('gods.edit', $god->id)) }}">Edit</a>
            <a href="{{ url(route('gods.delete', $god->id)) }}">Delete</a>
        @endif
    @endauth
</x-layout>
