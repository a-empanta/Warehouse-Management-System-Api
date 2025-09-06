<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateReceived = $this->faker->dateTimeBetween('-6 months', 'now');
        $expiryDate = (clone $dateReceived)->modify('+' . mt_rand(30, 365) . ' days');

        return [
            'warehouse_id' => mt_rand(0, 1),
            'product_id' => mt_rand(0, 500),
            'order_id' => null,
            'date_received' => $dateReceived,
            'expiry_date' => $expiryDate,
            'date_shipped' => null,
        ];
    }
}
