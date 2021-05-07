<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Genre;

use \Cache;

class FrontController extends Controller
{
    protected $paginate = 5;

    public function __construct()
    {
        view()->composer('partials.menu', function ($view) {
            $genres = Genre::pluck('name', 'id')->all();
            $view->with('genres', $genres);
        });
    }

    public function index()
    {
        // $books = Book::all();  retourne tous les livres de l'application
        // $books = Book::paginate(6);
        // $books = Book::published()->with('picture', 'authors')->paginate(6);

        $prefix = request()->page ?? 'home';
        $path = 'book'.$prefix;
        $books = Cache::remember($path, 60 * 24, function () {
            return Book::published()->with('picture', 'authors')->paginate($this->paginate); // pagination
        });

        return view('front.index', ['books' => $books]);
    }

    public function show(int $id)
    {
        $book = Book::find($id);
        return view('front.show', ['book' => $book]);
    }

    public function showBookByAuthor(int $id)
    {
        // récupérez les informations liés à l'auteur
        $author = Author::find($id); 
        // on récupère tous les livres d'un auteur
        $books = $author->books()->paginate(5); 
        // On passe les livres et le nom de l'auteur
        return view('front.author', ['books' => $books, 'author' => $author]);
    }

    public function showBookByGenre(int $id)
    {
        // on récupère le modèle genre.id 
        $genre = Genre::find($id);
        $books = $genre->books()->paginate(4);
        return view('front.genre', ['books' => $books, 'genre' => $genre]);
    }
}
