<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            $name = "Ürün $i";
            DB::table('products')->insert([
                'name' => $name,
                'slug'=> Str::slug($name),
                'description' => "$name için açıklama.",
                'price' => rand(10, 100) + rand(0, 99) / 100,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
