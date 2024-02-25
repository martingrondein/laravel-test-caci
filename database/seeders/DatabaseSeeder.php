<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Sales Agent',
            'email' => 'sales@coffee.shop',
        ]);

        $products = [
            ['name' => 'Gold coffee'],
            ['name' => 'Arabic coffee']
        ];

        foreach ($products as $productData) {
            Products::factory()->create($productData);
        }
    }
}
