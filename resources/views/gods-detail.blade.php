<x-layout>
    <h1>{{$god->name}}</h1>
    <p>Worshipped by {{ $god->user->name }}</p>

    @if(\Auth::user()->id = $god->user->name)
        <a href="{{ url(route('gods.edit', $god->id)) }}">Edit</a>
    @else
        <p>You can't edit this post</p>
    @endif
</x-layout>
