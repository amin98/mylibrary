<?php

namespace App\Http\Controllers;

use App\Models\BookCopy;
use App\Models\Loan;
use App\Models\User;
use App\Notifications\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class LoanController extends Controller
{
    public function __construct()
    {
        //middleware in order to make sure only authenticated user can go through the HomeController
        $this->middleware('auth');
    }

    public function store($id)
    {
        //variable that is the user_id in the parameter
        $userId = ['user_id' => $id];
        $loan = Loan::create($userId); //create new Loan object with the user_id

        //Populate the pivot table using the sync() method, inside the flattened session array
        $loan->bookCopies()->sync(Arr::flatten(Session::get('loansCart')));

        //bookCopies variable containing the same id that exist in the flattened session array
        $bookCopies = BookCopy::whereIn('id', Arr::flatten(Session::get('loansCart')))->get();

        //Loop through variable and change the 'available' column in the array
        foreach($bookCopies as $bookCopy) {
            $bookCopy->update(['available' => 0]);
        }

        //variable being that is the authenticated user object
        $user = Auth::user();

        //array with message text to show in the Notification mail
        $orderData = [
            'greeting' => 'Hello',
            'body' => 'We have received the books you wish to order',
            'thanks' => 'Thank you for your order',
            'actionText' => 'View Order',
            'actionURL' => route('loans.show', $loan->id),
            'order_id' => 1
        ];

        /*Send notification using the Notification instance, inside the send() method,
         2 parameters are needed which are the specified user and a new BookOrder object containing the
         orderDate array to show the message */
        Notification::send($user, new BookOrder($orderData));

        Session::forget('loansCart'); //Delete session after new book order object has been created

        //Send flash message for the next request
        Session::flash('successLoan', 'Thank you for your order, an email has been sent with your order details');

        //return to defined route using redirect method
        return redirect()->route('loans.cart');
    }

    public function show($id)
    {
        //show the Loan with the same id in the parameter
        $loan = Loan::with('bookCopies.book')->whereId($id)->first();

        //return view that contains the loan variable in order to show the data in the view
        return view('mail.notify', ['loan' => $loan]);
    }
}
