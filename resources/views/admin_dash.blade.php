<x-layout>
    <h1>Welcome to the Admin Dashboard</h1>
    <h2>God Posts</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Domain</th>
            <th>Pantheon</th>
            <th>Created By</th>
            <th>Active</th>
        </tr>
    @foreach($gods as $god)
        <tr>
            <th>{{ $god->name }}</th>
            <th>{{ $god->description }}</th>
            <th>{{ $god->domain }}</th>
            <th>{{ $god->pantheon }}</th>
            <th>{{ $god->user->name }}</th>
            <th>
                <form action="{{ url(route('admin.toggle', $god->id)) }}" method="GET">
                    @csrf
                    <button type="submit">
                        @if($god->active)
                            Active
                        @else
                            Not active
                        @endif
                    </button>
                </form>
            </th>
        </tr>
    @endforeach
    </table>
</x-layout>
