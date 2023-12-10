<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    //Function with a given slug
    public function index($slug)
    {
        //Get the book that is related to Author, compare the author slug with the parameter slug
        $books = Book::whereHas('author', function ($query) use ($slug){
            $query->where('authors.slug', $slug);
        })->get();


        //return view including book array
        return view('member.book.index', ['books' => $books]);
    }
}
