@extends('layouts.master')

@section('content')
<h1>Tous les livres par genre : {{ $genre->name ?? 'aucun genre' }}</h1>
{{ $books->links() }}
<ul class="list-group">
    @forelse($books as $book)
    <li class="list-group-item">
        <h2><a href="{{ url('book', $book->id) }}">{{ $book->title }}</a></h2>
        <div class="row">
            @if ($book->picture)
            <div class="col-md-5">
                    <img src="{{ asset('images/' . $book->picture->link) }}" alt="{{ $book->picture->title }}">
            </div>
            @endif
            <div class="col-md-6">
                {{ $book->description }}
            </div>
        </div>
        <h3> Auteur(s) :</h3>
        <ul>
            @forelse($book->authors as $author)
            <li><a href="{{ url('author', $author->id) }}">{{ $author->name }}</a></li>
            @empty
            <li>Aucun auteur</li>
            @endforelse
        </ul>
    </li>
    @empty
    <li>Désolé pour l'instant aucun livre n'est publié sur le site</li>
    @endforelse
</ul>
{{ $books->links() }}
@endsection