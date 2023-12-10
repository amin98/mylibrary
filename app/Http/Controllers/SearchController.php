<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*Determine whether search has been requested and get all book and author objects
     that are related to the search request value*/
    public function __invoke(Request $request)
    {
        if ($request->get('search') != '') {
            $books = Book::search($request->get('search'))->get();
            $authors = Author::search($request->get('search'))->get();
        }

        //return view including the request objects containing the search value and the book & author objects
        return view('member.search', [
            'searchRequest' => $request->get('search'),
            'books' => $books ?? [],
            'authors' => $authors ?? []
        ]);

    }
}
