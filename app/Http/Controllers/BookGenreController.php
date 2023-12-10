<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookGenreController extends Controller
{
    public function index($slug)
    {
        //Get books with the genre slug that has the same parameter slug
        $books = Book::whereHas('genre', function ($query) use ($slug){
            $query->where('genres.slug', $slug);
        })->get();

        //return view with books variable
        return view('member.book.index', ['books' => $books]);
    }
}
