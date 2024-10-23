<x-layout>
    <h1>{{$god->name}}</h1>
    <p>Worshipped by {{ $god->user->name }}</p>
    @foreach($god->tags as $tag)
        <p>{{ $tag->title }}</p>
    @endforeach

    @if(\Auth::user()->id = $god->user->name)
        <a href="{{ url(route('gods.edit', $god->id)) }}">Edit</a>
        <a href="{{ url(route('gods.delete', $god->id)) }}">Delete</a>
    @else
        <p>You can't edit this post</p>
    @endif
</x-layout>
