<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'terms' => $this->faker->numberBetween($min = 1, $max = 100),
        	'amount_reqd' => $this->faker->randomFloat($nbMaxDecimals = 5, $min = 0, $max = 10000),
        	'user_id' => User::factory()->create()->id,
        ];
    }
}
