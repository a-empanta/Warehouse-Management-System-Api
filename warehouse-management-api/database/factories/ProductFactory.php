<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected array $usedSkus = [];

    protected string $unitOfMeasure = '';

    protected int $itemSequestialNumber = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::all()->pluck('id')->toArray();
        $this->itemSequestialNumber += 1;

        return [
            'sku'               => $this->generateSku(),
            'name'              => 'item_number_' . $this->itemSequestialNumber,
            'description'       => $this->faker->sentences(1)[0],
            'category_id'       => array_rand($categoryIds),
            'reordering_level'  => $this->faker->randomNumber(),
            'unit_of_measure'   => $this->getUnitOfMeasure(),
            'weight'            => $this->getWeight(),
            'volume'            => $this->getVolume(),
            'length'            => $this->getLength(),
            'width'             => $this->getWidth(),
            'height'            => $this->getHeight(),
            'cost'              => min($this->faker->randomFloat($nbMaxDecimals = 2), 2000.00),
        ];
    }

    protected function generateSku(): string
    {
        $patterns = [
            '[a-z]{4,8}[_-]?[0-9]{5}',
            '[0-9]{5}[_-]?[a-z]{4,8}',
            '[a-z]{10}',
            '[0-9]{10}',
        ];
        
        do {
            $sku = $this->faker->regexify($patterns[array_rand($patterns)]);
        } while (in_array($sku, $this->usedSkus));

        $this->usedSkus[] = $sku;
        

        return $sku;         
    }

    protected function getUnitOfMeasure(): string
    {
        $units = ['kg','g','mg','lb','oz','l','ml','m','cm','mm','pcs','dozen','pack'];
        $this->unitOfMeasure = $units[array_rand($units)];

        return $this->unitOfMeasure;
    }

    protected function getWeight(): ?float
    {
        if (in_array($this->unitOfMeasure, ['kg','g','mg','lb','oz'])) {
            return min($this->faker->randomFloat($nbMaxDecimals = 2), 100.00);            
        }
        return null;
    }

    protected function getVolume(): ?float
    {
        if (in_array($this->unitOfMeasure, ['l','ml','oz'])) {
            return min($this->faker->randomFloat($nbMaxDecimals = 2), 5000.00);
        }
        return null;
    }

    protected function getLength(): ?float
    {
        if (in_array($this->unitOfMeasure, ['m','cm','mm'])) {
            return min($this->faker->randomFloat($nbMaxDecimals = 2), 3000.00);
        }
        return null;
    }

    protected function getWidth(): ?float
    {
        if (in_array($this->unitOfMeasure, ['m','cm','mm','l','ml','oz'])) {
            return min($this->faker->randomFloat($nbMaxDecimals = 2), 3000.00);
        }
        return null;
    }

    protected function getHeight(): ?float
    {
        if (in_array($this->unitOfMeasure, ['m','cm','mm','l','ml','oz'])) {
            return min($this->faker->randomFloat($nbMaxDecimals = 2), 100.00);
        }
        return null;
    }
}
