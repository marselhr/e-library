<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'Administrator')->first();

        $book = new Book();
        $book->user_id = $user->id;
        $book->title = 'Laskar Pelangi';
        $book->description = 'Laskar Pelangi adalah novel pertama karya Andrea Hirata yang diterbitkan oleh Bentang Pustaka pada tahun 2005. Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah (SD dan SMP) di sebuah sekolah Muhammadiyah di Belitung yang penuh dengan keterbatasan. ';
        $book->quantity = 2;
        $book->cover = 'dumi';
        $book->file = 'dumi';
        $book->save();

        $category = Category::where('name', 'Novel')->first();
        $book_category = new BookCategory();
        $book_category->book_id = $book->id;
        $book_category->category_id = $category->id;
        $book_category->save();
    }
}
