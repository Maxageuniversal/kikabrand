<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'description' => 'This is a product description.',
                'price' => 19.99,
                'stock_quantity' => 10,
                'category' => 'Electronics',
                'image_url' => 'product1.jpg',
                'inventory' => 100,
            ],
            // ... other product data
        ]);

        // Seed shipments table with destination values
        DB::table('shipments')->insert([
            [
                'tracking_number' => 123456789,
                'status' => 'In Transit',
                'estimated_delivery' => '2024-10-15',
                'origin' => 'Lagos',
                'destination' => 'Abuja', // Provide a value for destination
            ],
            // ... other shipment data
        ]);
    }
}
