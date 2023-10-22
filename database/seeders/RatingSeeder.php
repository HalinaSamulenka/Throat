<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedRatings = [
            ['id' => 01, 'name' => 'Unrated', 'stars' => 0, 'icon' => 'fa-solid fa-ghost', 'colour' => 'text-gray-500'],
            [
                'id' => 10, 'name' => 'Terrible', 'stars' => 0, 'icon' => 'fa-solid fa-poo',
                'colour' => 'text-yellow-800 dark:text-yellow-300'
            ],
            [
                'id' => 30, 'name' => 'Poor', 'stars' => 2, 'icon' => 'fa-solid fa-lemon',
                'colour' => 'text-yellow-500 dark:text-yellow-500'
            ],
            [
                'id' => 40, 'name' => 'Ok', 'stars' => 4, 'icon' => 'fa-solid fa-star',
                'colour' => 'text-blue-600 dark:text-blue-400'
            ],
            [
                'id' => 50, 'name' => 'Average', 'stars' => 6, 'icon' => 'fa-solid fa-star',
                'colour' => 'text-sky-500 dark:text-sky-500'
            ],
            [
                'id' => 70, 'name' => 'Great', 'stars' => 8, 'icon' => 'fa-solid fa-star',
                'colour' => 'text-lime-800 dark:text-lime-200'
            ],
            [
                'id' => 90, 'name' => 'Amazing', 'stars' => 10, 'icon' => 'fa-solid fa-pepper-hot',
                'colour' => 'text-red-600 dark:text-red-200'
            ],
        ];

        foreach ($seedRatings as $seedRating) {
            Rating::updateOrCreate($seedRating);
        }
    }
}
