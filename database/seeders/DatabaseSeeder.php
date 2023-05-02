<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(10)->create();
        Author::factory(10)->create();
        Book::factory(30)->create();
        Book::all()->each(function (Book $book) {
            $book->genres()->attach(Genre::query()->inRandomOrder()->limit(rand(1, 3))->get()->pluck('id'));
        });
    }
}
