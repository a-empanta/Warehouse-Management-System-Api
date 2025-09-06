<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
   protected array $coordinatesList = [
        ['lat' => 52.3676, 'lng' => 4.9041],
        ['lat' => 51.9244, 'lng' => 4.4777],
        ['lat' => 52.0907, 'lng' => 5.1214],
        ['lat' => 51.4416, 'lng' => 5.4697],
        ['lat' => 53.2194, 'lng' => 6.5665],
        ['lat' => 52.0116, 'lng' => 4.3571],
        ['lat' => 52.2292, 'lng' => 5.1669],
        ['lat' => 52.5200, 'lng' => 5.7497],
        ['lat' => 51.5853, 'lng' => 4.7750],
        ['lat' => 51.8133, 'lng' => 5.8372],
        ['lat' => 51.6978, 'lng' => 5.3037],
        ['lat' => 52.6979, 'lng' => 4.8091],
        ['lat' => 52.5050, 'lng' => 6.0908],
        ['lat' => 51.4920, 'lng' => 4.2900],
        ['lat' => 51.5606, 'lng' => 5.0919],
        ['lat' => 52.1583, 'lng' => 4.4931],
        ['lat' => 52.6316, 'lng' => 4.7485],
        ['lat' => 52.3824, 'lng' => 4.6384],
        ['lat' => 52.2539, 'lng' => 6.1776],
        ['lat' => 51.9692, 'lng' => 5.6654],
    ];


    private int $index = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $coordinates = $this->coordinatesList[$this->index];
        $this->index++;

        return [
            'user_id' => User::factory(),
            'coordinates' => $coordinates,
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'country' => 'Netherlands',
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
