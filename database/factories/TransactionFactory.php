<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Category;
use Carbon\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Arr::random(Category::pluck('id')->all()),
            'transaction_date' => Carbon::now()->subDays(rand(1, 30)),
            'amount' => fake()->randomNumber(),
            'description' => fake()->paragraph(),

        ];
    }
}
