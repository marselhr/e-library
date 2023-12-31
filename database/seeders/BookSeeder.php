<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
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
        $novel = BookCategory::where('name', 'Novel')->first();
        $komik = BookCategory::where('name', 'Komik')->first();
        $user = User::where('role_id', 1)->first();
        $admin = User::where('role_id', 2)->first();
        $books = [
            [
                'user_id' => $admin->id,
                'category_id' => $novel->id,
                'title' => 'Laskar Pelangi',
                'description' => 'Laskar Pelangi adalah novel pertama karya Andrea Hirata yang diterbitkan oleh Bentang Pustaka pada tahun 2005. Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah (SD dan SMP) di sebuah sekolah Muhammadiyah di Belitung yang penuh dengan keterbatasan.',
                'quantity' => 2,
                'cover' => 'laskar-pelangi.jpeg',
                'file' => 'contoh.pdf'
            ],
            [
                'user_id' => $user->id,
                'category_id' => $novel->id,
                'title' => 'Bulan',
                'description' => 'Bulan adalah sebuah novel karya Tere Liye, novel ini adalah buku kedua dari seri Bumi/serial Dunia Paralel. Diterbitkan pertama kali oleh Gramedia Pustaka Utama tahun 2015.',
                'quantity' => 5,
                'cover' => 'bulan.jpeg',
                'file' => 'contoh.pdf'
            ],
            [
                'user_id' => $user->id,
                'category_id' => $komik->id,
                'title' => 'Naruto Shippuden Season 1',
                'description' => 'Naruto adalah sebuah serial manga karya Masashi Kishimoto yang diadaptasi menjadi serial anime. Manga Naruto bercerita seputar kehidupan tokoh utamanya, Naruto Uzumaki, seorang ninja yang hiperaktif, periang, dan ambisius yang ingin mewujudkan keinginannya untuk mendapatkan gelar Hokage, pemimpin dan ninja terkuat di desanya. Serial ini didasarkan pada komik one-shot oleh Kishimoto yang diterbitkan dalam edisi Akamaru Jump pada Agustus 1997',
                'quantity' => 5,
                'cover' => 'naruto-shippuden.jpeg',
                'file' => 'contoh.pdf'
            ]
        ];
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
