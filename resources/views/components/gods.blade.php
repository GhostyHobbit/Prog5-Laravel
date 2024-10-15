@props(['god'])

<article>
    <h2>{{ $god->name }}</h2>
    <p>{{ $god->description }}</p>
    <p>{{ $god->domain }}</p>
    <p>{{ $god->pantheon }}</p>
    <a href="gods/{{ $god->id }}">Details</a>
</article>
