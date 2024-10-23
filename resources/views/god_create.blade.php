<x-layout>
    <h1>Add new God</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url(route('gods.store')) }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name"/>

        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>

        <label for="domain">Domain</label>
        <textarea id="domain" name="domain"></textarea>

        <label for="pantheon">Pantheon</label>
        <input id="pantheon" name="pantheon">

        <label for="tags[]">Tags</label>
        <select id="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <button type="submit">Save</button>
    </form>
</x-layout>
