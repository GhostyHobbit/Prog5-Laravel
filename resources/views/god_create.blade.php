<x-layout>
    <h1>Add new God</h1>
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

        <button type="submit">Save</button>
    </form>
</x-layout>
