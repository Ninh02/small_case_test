<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->id = 1;
        $book->name = 'Tôi quyết định sống cho chính tôi';
        $book->image = 'image/sach1.jpg';
        $book->writerName = 'KimSuHyun';
        $book->category_id = 1;
        $book->price = 50000;
        $book->description = 'sách tâm lí học hay';
        $book->save();
    }
}
