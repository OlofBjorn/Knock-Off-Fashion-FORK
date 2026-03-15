<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = [
            'Guggi',
            'Bland-ciaga',
            'Herrman',
            'Blueberry',
            'Lucas Shitton'
        ];

        $colors = [
            'Black',
            'White',
            'Red',
            'Green',
            'Patterns'
        ];

        $categories = [
            'Shoes',
            'Jackets',
            'Pants',
            'Tops',
            'Bags',
            'Caps'
        ];

        $productbrand = fake()->randomElement($brands);

        $suffixes = ['Max', 'Elite', 'Ultra', 'Pro', 'Plus'];

        return [
            'brand_name' => $productbrand,
            'product_name' => $productbrand . ' Model ' .
                fake()->numberBetween(100, 999) . ' ' .
                fake()->optional()->randomElement($suffixes),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 199, 999),
            'category' => fake()->randomElement($categories),
            'color'=> fake()->randomElement($colors),
            'stock'=> fake()->numberBetween(0, 50),
        ];
    }
}
