<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class LoanCartController extends Controller
{
    public function index()
    {
        //Get session and make an array, flatten the array to make a multidimensional array into a singular array
        if (Session::has('loansCart')) {
            $books = Book::query()->whereHas('bookCopies', function ($q) {
                $q->whereIn('id', array_filter(array_unique(Arr::flatten(Session::get('loansCart')), SORT_REGULAR)));
            })->get();
        }

        //return view including the array
        return view('member.cart', ['books' => $books ?? []]);
    }

    public function store($id, $slug)
    {
        //variable in which id is being searched in the session
        $index = array_search($id, $selection = Session::get('loansCart', []));


        //If statement in order to check if the id already exists in the session array
        //Followed by a flash message using Session to indicate that the id already exists in the array
        //If it doesn't exist yet, push the id in to the session
        //Followed by a flash message using Session to indicate has been added to the array
        if ($index !== false) {
            array_splice($selection, $index, 1);
            Session::flash('doubleCartStore', ' is already in your Cart!');

        } else {
            $selection[] = $id;
            Session::push('loansCart', $id);
            Session::flash('success', ' has been added to your Cart!');

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

    public function destroy($id)
    {
        //Get BookCopy object with the same book_id in the parameter
        $bookCopy = BookCopy::query()->where('book_id', $id)->first();
        $bookCopyId = $bookCopy->id; //variable that is the bookCopy id

        //Make sure session array is being flattened in order to make a singular array instead of a multidimensional array
        $bookCopies = Arr::flatten(Session::get('loansCart'));

        //search for id in the bookCopies array
        $arrayId = array_search($bookCopyId, $bookCopies);

        //remove id from the bookCopies array
        unset($bookCopies[$arrayId]);

        //check if bookCopies array is empty, if true then delete the whole session
        //If false the delete the session the create a new session with the existing values
        if(empty($bookCopies))
        {
            Session::forget('loansCart');
        }
        else
        {
            Session::forget('loansCart');
            Session::push('loansCart', array_filter($bookCopies));
        }

        //Return to defined route using redirect method
        return redirect()->route('loans.cart');
    }
}
