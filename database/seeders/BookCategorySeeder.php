<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Komik',
                'description' => 'Komik Description'
            ],
            [
                'name' => 'Novel',
                'description' => 'Novel Description'
            ],
            [
                'name' => 'Ensiklopedia',
                'description' => 'Ensiklopedia Description'
            ],
            [
                'name' => 'Kamus',
                'description' => 'Kamus Description'
            ],
            [
                'name' => 'Majalah',
                'description' => 'Majalah Description'
            ],
            [
                'name' => 'Biografi',
                'description' => 'Kamus Description'
            ],
            [
                'name' => 'Naskah',
                'description' => 'Naskah Description'
            ],
            [
                'name' => 'Karya Ilmiah',
                'description' => 'Karya Description'
            ],
            [
                'name' => 'Fotografi',
                'description' => 'Fotografi Description'
            ],
        ];

        foreach ($categories as $category) {
            BookCategory::create($category);
        }
    }
}
