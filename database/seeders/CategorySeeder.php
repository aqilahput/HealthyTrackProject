<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Salad Sehat',
                'description' => 'Kategori makanan sehat yang berbahan dasar sayuran segar dan dressing ringan.',
            ],
            [
                'name' => 'Smoothie',
                'description' => 'Kategori minuman sehat yang terbuat dari campuran buah-buahan, yogurt, dan bahan-bahan sehat lainnya.',
            ],
            [
                'name' => 'Makanan Rendah Kalori',
                'description' => 'Kategori makanan dengan kandungan kalori yang rendah namun tetap bergizi dan mengenyangkan.',
            ],
            [
                'name' => 'Makanan dengan Alpukat',
                'description' => 'Kategori makanan yang menggunakan alpukat sebagai bahan utama, kaya lemak sehat.',
            ],
            [
                'name' => 'Makanan Kaya Protein',
                'description' => 'Kategori makanan dengan kandungan protein tinggi untuk mendukung pembentukan otot dan pemulihan tubuh.',
            ],
        ]);
    }
}
