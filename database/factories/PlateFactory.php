<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plate;
use App\Models\Subcategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();

        return [
            'name' => $name,
            'price_small' => 25.00,
            'price_medium' => 35.00,
            'price_family' => 45.00,
            'subcategory_id' => $subcategory->id,
            'status' => 2
        ];
    }
}
