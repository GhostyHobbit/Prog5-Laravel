@props(['god'])

<article>
    <h2>{{ $god->name }}</h2>
    <p>Description: {{ $god->description }}</p>
    <p>Domain: {{ $god->domain }}</p>
    <p>Pantheon: {{ $god->pantheon }}</p>
    <a href="gods/{{ $god->id }}">Details</a>
</article>
