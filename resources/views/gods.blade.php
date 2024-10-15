<x-layout >
    <h1>Gods overview (articles)</h1>
    @foreach($gods as $god)
        <x-gods :god="$god"/>
    @endforeach
</x-layout>
