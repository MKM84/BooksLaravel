@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
        @if ($book)
        @if ($book->picture)
        <div class="col-md-12">
            <img src="{{ asset('images/' . $book->picture->link) }}" alt="{{ $book->picture->title }}">
        </div>
        @endif
        <h1>{{ $book->title }}</h1>

        <h2>Description :</h2>
        {{ $book->description }}
        <h3>Auteur(s) :</h3>
        <ul>
            @forelse($book->authors as $author)
            <li><a href="{{ url('author', $author->id) }}" title="{{ $author->name }}">{{ $author->name }}</a></li>
            @empty
            <li>Aucun auteur</li>
            @endforelse
        </ul>
        @else
        <h1>Désolé aucun article</h1>
        @endif
        </li>
    </div>
</article>

</ul>
@endsection