<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\File;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(path:'database/json/books.json');

        $books = collect(json_decode($json));

        $books->each(function($book){
            Book::create([
                'book_name' => $book->book_name,
                'author' => $book->author
            ]);
        });
    }
}
