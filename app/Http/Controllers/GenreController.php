<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //make varaible containing all Genre objects
        $genres = Genre::all();

        //return view including genres array
        return view('member.genre.index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //return view with a form
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //create variable in which values in request array is being validated
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        //Create new Genre object containing the validated data
        Genre::create($validatedData);

        //return to defined route using redirect method
        return redirect()->route('genres.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //Get genre object with the same id in the parameter
        $genre = Genre::query()->find($id);

        //return view with the genre object
        return view('admin.genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //Get genre with the same id in the parameter
        $genre = Genre::whereId($id)->firstOrFail();

        //validate the data that is being sent
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        //Use update() method containing validated data array to create an updated genre
        $genre->update($validatedData);

        //redirect to the same view using redirect method that's heading towards the defined route
        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //Variable with the same id in the parameter
        $genre = Genre::whereId($id)->firstOrFail();

        //Delete Author object
        $genre->delete();

        //redirect to the same view using redirect method that's heading towards the defined route
        return redirect()->route('genres.index');
    }
}
