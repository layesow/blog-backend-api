<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['nom' => 'Technologie', 'description' => 'Articles sur la technologie'],
            ['nom' => 'Éducation', 'description' => 'Articles éducatifs'],
        ]);

    }
}
