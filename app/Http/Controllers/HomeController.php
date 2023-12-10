<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware in order to make sure only authenticated user can go through the HomeController
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view with books and only show 11 book objects per page using the paginate() method
        return view('home', ['books' => Book::query()->paginate(11)] );
    }
}
