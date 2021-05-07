@extends('layouts.master')

@section('content')

<div class=" col-md-12">
    <h1>Tous les derniers livres publiés sur notre site</h1>

    {{ $books->links() }}
</div>

<div>
    @forelse($books as $book)

    <div class="card col-lg-4 col-md-6">
        @if ($book->picture)
        <img class="card-img-top" src="{{ asset('images/' . $book->picture->link) }}" alt="{{ $book->picture->title }}">
        @endif

        <div class="card-body">
            <h3 class="card-title">{{ $book->title }}</h3>
            <p class="card-text">{{ $book->description }}</p>

            @forelse($book->authors as $author)
            <a href="{{ url('author', $author->id) }}" title="{{ $author->name }}">
                <h4 class="card-text">{{ $author->name }}</h4>
            </a>
            @empty
            <p class="card-text">Aucun auteur</p>
            @endforelse

            <a href="{{ url('book', $book->id) }}" class="btn btn-primary">Details</a>
        </div>
    </div>
    @empty
    <li>Désolée pour l'instant aucun livre n'est publié sur le site</li>
    @endforelse
</div>
@endsection