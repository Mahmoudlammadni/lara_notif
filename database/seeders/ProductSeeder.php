<?php

namespace Database\Seeders;
use App\Models\Product;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // database/seeders/ProductSeeder.php


    Product::create(['name' => 'Laptop', 'price' => 1500]);
    Product::create(['name' => 'Phone', 'price' => 800]);
    Product::create(['name' => 'Headphones', 'price' => 200]);

    }
}
