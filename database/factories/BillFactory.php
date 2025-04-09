<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'bill_number' => $this->faker->unique()->uuid,
            'details' => $this->faker->paragraph,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            // 'user_approval' => $this->faker->boolean,
            'favorite' => $this->faker->boolean,
            'category_id' => Category::all()->random()->id, // You can assign a category_id later in the seeder
            'user_id' => null, // You can assign a user_id later in the seeder
            // 'dealer_id' => null, // You can assign a dealer_id later in the seeder
        ];
    }
}
