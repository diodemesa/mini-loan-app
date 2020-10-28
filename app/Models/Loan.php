<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    
    protected $fillable = ['loan_id','amount_reqd', 'terms', 'user_id'];
    protected $primaryKey = 'loan_id';
}
