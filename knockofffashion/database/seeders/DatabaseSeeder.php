<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Shoes', 
            'Bags', 
            'Jackets', 
            'Pants', 
            'Caps'
        ];

            foreach ($categories as $category) {
             
                Product::factory(5)->create([
                
                'category' => $category
       
                ]);
            }

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
        ]);
    }
}
