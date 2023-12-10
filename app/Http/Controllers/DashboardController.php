<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        //Creat variable thats the authenticated user
        $user = Auth::user();

        $loans = $user->loans;

        //Get cookie and make it into an array, use array_filter to prevent any empty values in the array
        if (Cookie::has('wishlist')) {
            $cookie = Cookie::get('wishlist');
            $cookieArray = explode(',', json_decode($cookie));
            $newArray = array_filter($cookieArray);

            $cookieBooks = Book::query()->whereHas('bookCopies', function ($q) use ($newArray) {
                $q->whereIn('id', Arr::flatten($newArray));
            })->get();
        }

        //Get session and make an array, flatten the array to make a multidimensional array into a singular array
        if (Session::has('loansCart')) {
            $sessionBooks = Book::query()->whereHas('bookCopies', function ($q) {
                $q->whereIn('id', Arr::flatten(Session::get('loansCart')));
            })->get();
        }

        //return view including the array
        return view('member.dashboard.index', [
            'loans' => $loans,
            'cookieBooks' => $cookieBooks ?? [],
            'sessionBooks' => $sessionBooks ?? [],
        ]);
    }

    public function edit(User $user) //paramater with user object
    {
        //return view including user object
        return view('member.dashboard.account', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        //Create variable in which request data is being validated
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'street' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
        ]);

        //Update user object using the update() method based on new validated data
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'street' => $validatedData['street'],
            'house_number' => $validatedData['house_number'],
            'postal_code' => $validatedData['postal_code'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'phone' => $validatedData['phone'],

            'password' => !empty($validatedData['password'])
                ? Hash::make($validatedData['password'])
                : $user->password,
        ]);

        //slug from user
        $slug = $user->slug;

        //Flash message using session. This session variable is only available at the page after the redirection
        Session::flash('successUpdateAccount', 'Your account settings have been updated!');

        //return to defined route using redirect method
        return redirect()->route('dashboard', ['slug' => $slug]);
    }
}
