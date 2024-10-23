<x-layout>
    <h1>Edit God</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url(route('gods.update', $god->id)) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input id="name" name="name" value="{{ $god->name }}"/>

        <label for="description">Description</label>
        <textarea id="description" name="description">{{ $god->description }}</textarea>

        <label for="domain">Domain</label>
        <textarea id="domain" name="domain" >{{ $god->domain }}</textarea>

        <label for="pantheon">Pantheon</label>
        <input id="pantheon" name="pantheon" value="{{ $god->pantheon }}">

        <label for="tags[]">Tags</label>
        <select id="tags[]" name="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ $god->tags->contains($tag->id) ? "selected" : ""}}>{{ $tag->title }}</option>
            @endforeach
        </select>

        <button type="submit">Save</button>
    </form>
</x-layout>
