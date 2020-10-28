<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'repayment_id';    
    protected $fillable = ['repayment_id','payer', 'loan_id', 'amount', 'payment_date'];

    /**
     * Get the loan associated with the repayment.
     */
	public function loan()
	{
	    return $this->belongsTo('App\Models\Loan', 'loan_id', 'loan_id');
	}
}