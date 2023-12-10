<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        /*Get the cookie and turn it into an array, use the array_filter method to prevent empty array values
          Variable books that have the same id in cookie array, flatten the cookie array to make it a singular array
            instead of a multidimensional array
        */
        if (Cookie::has('wishlist')) {
            $cookie = Cookie::get('wishlist');
            $cookieArray = explode(',', json_decode($cookie));
            $newArray = array_filter($cookieArray);

            $books = Book::query()->whereHas('bookCopies', function ($q) use ($newArray) {
                $q->whereIn('id', Arr::flatten($newArray));
            })->get();
        }

        //return view including the books array
        return response(view('member.wishlist', ['books' => $books ?? []]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id, $slug) //given id and slug, Request instance to get request values
    {
        $cookieArray = explode(',', json_decode($request->cookie('wishlist')));        //Turn cookie into an array
        $index = array_search($id, $cookieArray); // search for the given id in the array

        /*If statement in order to check if the id already exists in the cookie array
            Followed by a flash message using Session to indicate that the id already exists in the array
            If it doesn't exist yet, push the id in to the cookie array
            Followed by a flash message using Session to indicate has been added to the array
        */
        if ($index !== false) {
            array_splice($cookieArray, $index, 1);
            Session::flash('doubleWishlistStore', ' is already in your Wishlist!');

        } else {
            $cookieValue = "";
            $cookieValue .= json_decode($request->cookie('wishlist'));
            $cookieValue .= $id . ',';

            Cookie::queue('wishlist', json_encode($cookieValue), 20000);
            Session::flash('successWishlist', ' has been added to your Wishlist!');
        }

        //Get the book with the same id and slug
        $book = Book::query()->whereHas('bookCopies', function ($q) use ($id) {
            $q->whereId($id);
        })->whereSlug($slug)->first();

        //Slug variable that is the slug from the book
        $slug = $book->slug;

        //Return to defined route using redirect method
        return redirect()->route('book.show', ['book' => $book, 'slug' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //Get BookCopy object with the same book_id in the parameter
        $book = Book::findOrFail($id);
        $bookCopyId = $book->firstAvailableBookCopyId();;


        $cookie = Cookie::get('wishlist');//Cookie variable
        $cookieArray = explode(',', json_decode($cookie)); //turn cookie into a string

        $newArray = array_filter($cookieArray); // use array_filter method to prevent the array from having empty values
        $arrayId = array_search($bookCopyId, $newArray); // search for the given id in the filtered array

        //if the given has been found and is not false, remove the id from the cookie array
        if ($arrayId !== false) {
            unset($newArray[$arrayId]);
        }
        Cookie::forget('wishlist'); //delete the entire cookie

        $stringArray = implode(',', $newArray); // turn the array into a string

        //Make a new cookie instance with the existing value from string array, duration of the cookie
        Cookie::queue('wishlist', json_encode($stringArray, 20000));

        //Return to defined route using redirect method
        return redirect()->route('wishlist.index', ['book' => $book ?? []])->withCookie(Cookie::forget('wishlist')); //
    }
}
