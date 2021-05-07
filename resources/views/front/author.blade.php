@extends('layouts.master')

@section('content')
<h1>Tous les livres de l'auteur : {{ $author->name ?? 'aucun nom' }}</h1>
{{ $books->links() }}
<ul class="list-group">
    @if ($books)
    @forelse($books as $book)
    <li class="list-group-item">
        <h2><a href="{{ url('book', $book->id) }}">{{ $book->title }}</a></h2>
        <div class="row">
            @if ($book->picture)
            <div class="col-xs-2 col-md-4">
                <a href="#" class="">
                    <img src="{{ asset('images/' . $book->picture->link) }}" alt="{{ $book->picture->title }}">
                </a>
            </div>
            @endif

            <div class="col-xs-3 col-md-5">
                {{ $book->description }}
            </div>

        </div>
        <div>
            <h3>Autres Auteur(s) :</h3>
            <ul>
                @forelse($book->authors as $relationAuthor)
                @if ($author->id != $relationAuthor->id)
                <li><a href="{{ url('author', $relationAuthor->id) }}">{{ $relationAuthor->name }}</a></li>
                @endif
                @empty
                <li>Aucun autres auteurs</li>
                @endforelse
            </ul>
        </div>
    </li>
    @empty
    <li>Désolé pour l'instant aucun livre n'est publié sur le site</li>

    @endforelse
    @endif
</ul>
{{ $books->links() }}
@endsection