<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Get all books
        //Eager loading to solve N+1 problem
        $books = Book::with(['author', 'genre'])->get();

        //Variable with the alphabet as a string
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        //Make alphabet string into an array
        $alphabetArray = str_split($alphabet);

        //return view to show all books including books and alphabet array
        return view('member.book.index', [
            'books' => $books,
            'alphabetArray' => $alphabetArray,
        ]);
    }

    /**
     * Show the form for creating a new resource.*
     */
    public function create(): View
    {
        //return view with a form including all author and genre object
        return view('admin.book.create', [
            'authors' => Author::all(),
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Create variable in which request data is being validated
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required',
            'genre_id' => 'required',
            'blurb' => 'required',
            'image' => 'required|image',
        ]);

        //Create variable in which title is slugged
        $imageName = Str::slug($validatedData['title']);

        //Get file from the request() method and store it in the images folder with the file name as the $imageName variable
        $validatedData['image'] = request()->file('image')->storeAs('images', $imageName . '.jpg');

        //Create new Book object with the validated data
        Book::create($validatedData);

        //redirect towards the defined route
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug) //Parameter with given slug
    {
        //Get the first book that has the same slug in the parameter
        $book = Book::query()->whereSlug($slug)->first();

        //Create variable that is the parameter slug
        $slug = $book->slug;

        //Return view including the book and slug variable
        return view('member.book.show', ['book' => $book, 'slug' => $slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(Book $book) //Book id
    {
        //return view with book, author and genre objects
        return view('admin.book.edit', [
            'book' => $book,
            'authors' => Author::all(),
            'genres' => Genre::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        //Get book with same id in the parameter
        $book = Book::whereId($id)->firstOrFail();

        //Create variable with validated date using validate method
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required',
            'genre_id' => 'required',
            'blurb' => 'required',
            'image' => 'image',
        ]);

        //Create variable in which title is slugged
        $imageName = Str::slug($book->title);

        //check if image is already set
        //Get file from the request() method and store it in the images folder with the file name as the $imageName variable
        if(isset($validatedData['image'])){
            $validatedData['image'] = request()->file('image')->storeAs('images', $imageName . '.jpg');
        }

        //Update the book object using the validated data inside the update() method
        $book->update($validatedData);

        //return to defined route using redirect method
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Book $book)//Book id
    {
        //Delete book object using the delete() method
        $book->delete();

        //redirect towards the defined route
        return redirect()->route('books.index');
    }
}
