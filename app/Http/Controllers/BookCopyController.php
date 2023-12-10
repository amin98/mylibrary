<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use Illuminate\Http\Request;

class BookCopyController extends Controller
{
    public function index()
    {
        //get all books
        $books = Book::with(['author', 'genre'])->withCount('bookCopies')->get();

        //return view including books array
        return view('admin.book_copies.index', ['books' => $books]);
    }

    public function store($id)
    {
        //add one row with the given id
        $copy = ['book_id' => $id];
        BookCopy::create($copy);

        return redirect()->route('admin.book_copies.index');
    }

    public function destroy($id)
    {
        //delete only 1 row from the given id
        $book = BookCopy::query()->where('book_id', $id);
        $book->limit(1)->delete();

        //redirect to defined route
        return redirect()->route('admin.book_copies.index');
    }
}
