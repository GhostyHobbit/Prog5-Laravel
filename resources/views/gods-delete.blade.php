<x-layout>
    <h1>Are you sure you want to delete {{ $god->name }}</h1>
    <form action="{{ url(route('gods.destroy', $god->id)) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
</x-layout>
