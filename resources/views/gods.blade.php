<x-layout >
    <h1>Gods overview (articles)</h1>
    <a href="{{ url(route('gods.create')) }}">Add new God</a>
    @foreach($gods as $god)
        <x-gods :god="$god"/>
    @endforeach
</x-layout>
