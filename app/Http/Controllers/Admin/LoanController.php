<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //show all Loans and return the view including an array containing the loans of the users
    public function index()
    {
        $loans = Loan::all();

        return view('admin.loans.index', ['loans' => $loans]);
    }

    //update the loan with the column 'handed_in' to 1 and delete the loan with the column
    public function update(Loan $loan)
    {
        $loan->update(['handed_in' => 1]);
        $loan->destroy(['handed_in' => 0]);

        return redirect()->route('admin.loans.index', ['loans' => Loan::all()]);
    }
}
