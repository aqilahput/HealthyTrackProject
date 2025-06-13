<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foods')->insert([
            [
                'name' => 'Salad Buah Segar',
                'description' => 'Salad buah segar dengan campuran stroberi, melon, dan kiwi.',
                'calories' => 150,
                'fat' => 1.2,
                'protein' => 2.5,
                'carbohydrate' => 35,
                'cooking_time' => 10,
                'ingredients' => 'stroberi, melon, kiwi, madu, lemon',
                'steps' => '1. Potong buah. 2. Campur dengan madu dan lemon. 3. Sajikan dingin.',
                'image' => 'salad_buah_segar.jpg',
                'category_id' => 1, // Salad Sehat
            ],
            [
                'name' => 'Smoothie Mangga',
                'description' => 'Smoothie mangga dengan tambahan yogurt dan madu alami.',
                'calories' => 200,
                'fat' => 2.5,
                'protein' => 4,
                'carbohydrate' => 40,
                'cooking_time' => 5,
                'ingredients' => 'mangga, yogurt, madu, es batu',
                'steps' => '1. Blender semua bahan hingga halus. 2. Tuang ke gelas dan sajikan.',
                'image' => 'smoothie_mangga.jpg',
                'category_id' => 2, // Smoothie
            ],
            [
                'name' => 'Omelet Putih Telur',
                'description' => 'Omelet putih telur dengan sayuran segar tanpa minyak.',
                'calories' => 120,
                'fat' => 1,
                'protein' => 15,
                'carbohydrate' => 3,
                'cooking_time' => 8,
                'ingredients' => 'putih telur, bayam, jamur, bawang bombay',
                'steps' => '1. Kocok putih telur. 2. Tumis sayuran. 3. Masak omelet sampai matang.',
                'image' => 'omelet_putih_telur.jpg',
                'category_id' => 3, // Makanan Rendah Kalori
            ],
            [
                'name' => 'Toast Alpukat',
                'description' => 'Roti panggang dengan alpukat tumbuk dan taburan biji wijen.',
                'calories' => 300,
                'fat' => 15,
                'protein' => 6,
                'carbohydrate' => 35,
                'cooking_time' => 7,
                'ingredients' => 'roti tawar, alpukat, biji wijen, garam, lada',
                'steps' => '1. Panggang roti. 2. Tumbuk alpukat dan bumbui. 3. Oles di roti, tabur biji wijen.',
                'image' => 'toast_alpukat.jpg',
                'category_id' => 4, // Makanan dengan Alpukat
            ],
            [
                'name' => 'Ayam Panggang Protein Tinggi',
                'description' => 'Ayam panggang dengan bumbu rempah dan sayuran kukus.',
                'calories' => 400,
                'fat' => 10,
                'protein' => 40,
                'carbohydrate' => 5,
                'cooking_time' => 45,
                'ingredients' => 'dada ayam, bawang putih, lada, sayuran kukus',
                'steps' => '1. Lumuri ayam dengan bumbu. 2. Panggang ayam sampai matang. 3. Sajikan dengan sayuran kukus.',
                'image' => 'ayam_panggang.jpg',
                'category_id' => 5, // Makanan Kaya Protein
            ],
        ]);
    }
}
