<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Repayment;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public $currency = 'SGD';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::latest()->where('')->get();
        return view('loans.index',[
                'loans' => $loans,
                'currency' => $this->currency
            ]);	
  //       return response()->json([
		//     'loans' => $loans,
  //           'currency' => $this->currency
		// ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loan = Loan::create([
	        'amount_reqd' => $request->get('amount_reqd'),
	        'terms' => $request->get('terms'),
	        'user_id' => Auth::id()
	    ]);

	    return redirect('/loan/'.$loan->loan_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        $repayments = Repayment::where('loan_id','=', $loan->loan_id)->get();

        return view('loans.show',[
                'loan' => $loan,
                'repayments' => $repayments,
                'currency' => $this->currency
            ]);
    }

    public function processLoanApplication()
    {

    }
}
