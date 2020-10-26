<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\Repayment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RepaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$loan = Loan::all()->first();
        return [
            'payer' => $loan->user_id,
        	'loan_id' => $loan->loan_id,
        	'payment_date' => $this->faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
        	'amount' => $loan->amount_reqd/$loan->terms
        ];
    }
}