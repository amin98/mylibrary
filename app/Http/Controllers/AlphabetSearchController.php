<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AlphabetSearchController extends Controller
{
    //Get all the books that start with the given parameter '$letter'. including the with() method in the query to prevent the N+1 problem
    public function __invoke($letter)
    {
        //Query to get the specific books
        $books = Book::query()->where('title', 'like', $letter . '%')->with(['author', 'genre'])->get();

        //return the view including the $books array
        return view('member.book.index', [
            'books' => $books ?? [],
        ]);
    }
}
