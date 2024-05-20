<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function($user){
            $numBooks = random_int(5,10);
            $numReviews = random_int(5, 30);
            Book::factory( $numBooks)->create()->each(function($book) use ($user) {
                $numReviews = random_int(5, 30);
                Review::factory()->count( $numReviews)->for($book)->for($user)->create();
            });
        });
        /*Book::factory(33)->create()->each(function($book){
            $numReviews = random_int(5, 30);
            Review::factory()->count( $numReviews);
        });
        */
    }
}
