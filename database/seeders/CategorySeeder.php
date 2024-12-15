<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ana Kategoriler için seeder
        for ($i = 1; $i <= 4; $i++) {
            $name = "Kategori $i";
            DB::table('categories')->insert([
                'name' => $name,
                'slug'=>Str::slug($name),
                'description'=>"$name için açıklama",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        

    }
}
