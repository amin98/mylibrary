<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creating an array with all Author object
        $authors = Author::all();

        //return the view including the array
        return view('member.author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view with a form
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Request parameter that contains the data that is being sent
    {
        //creating variable in which the data is being validated using the validation() function
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        //Create new Author object with the validated data
        Author::create($validatedData);

        //After creating the object, return to the same page using the redirect method that's heading towards the defined route
        return redirect()->route('authors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //Parameter containing a given id of an Author
    {
        //Get the Author that has the same id in the parameter
        $author = Author::query()->find($id);

        //return view with a form including the author variable
        return view('admin.author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) //2 parameters Request and given id
    {
        //Get author with the same id in the parameter
        $author = Author::whereId($id)->firstOrFail();

        //validate the data that is being sent
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        //Use update() method containing validated data array to create an updated author
        $author->update($validatedData);

        //redirect to the same view using redirect method that's heading towards the defined route
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author) //Given Author object with id
    {
        //If Author is deleted, the related books will also be deleted
        //loop through the books that have the author from the parameter and delete the specific book
        foreach($author->books as $book) {
            $book->delete();
        }

        //Delete Author object
        $author->delete();

        //redirect to the same view using redirect method that's heading towards the defined route
        return redirect()->route('authors.index');
    }
}
