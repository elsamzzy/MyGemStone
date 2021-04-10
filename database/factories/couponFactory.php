<?php

namespace Database\Factories;

use App\Models\coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class couponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(6),
            'amount' => $this->faker->randomNumber(5),
        ];
    }
}
