<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\User;
use App\Models\Course;
use App\Models\BookCategory;
use App\Models\CourseMaterial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Course::factory(10)->has(
            CourseMaterial::factory(10)
        )->create();

        DB::table('roles')->insert([
            [
                'name' => 'guest',
                'description' => 'guest user',
            ],
            [
                'name' => 'admin',
                'description' => 'administrator',
            ],
        ]);
        BookCategory::factory()->count(5)->create();
        User::factory()->count(5)->has(
            Book::factory()->count(10)
                ->state(new Sequence(
                    fn (Sequence $sequence) => ['category_id' => BookCategory::all()->random()],
                ))
        )
            ->create();
    }
}
