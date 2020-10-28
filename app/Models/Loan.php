<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    
    protected $fillable = ['loan_id','amount_reqd', 'terms', 'user_id', 'status', 'currency'];
    protected $primaryKey = 'loan_id';

    /**
     * Get the repayments for the loan.
     */
    public function repayments()
    {
        return $this->hasMany('App\Models\Repayment', 'loan_id');
    }
}
