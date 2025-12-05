<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'name' => 'Margaret Street',
                'text' => 'A dog in heat needs more than shade The more people paw prints forever on our hearts. I meet the more I like my dog. Dogs leave paw prints forever on our hearts.',
                'rating' => 5,
                'photo' => null,
                'social_link_1' => '#!',
                'social_link_2' => '#!',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Margaret Street',
                'text' => 'A dog in heat needs more than shade The more people paw prints forever on our hearts. I meet the more I like my dog. Dogs leave paw prints forever on our hearts.',
                'rating' => 5,
                'photo' => null,
                'social_link_1' => '#!',
                'social_link_2' => '#!',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Margaret Street',
                'text' => 'A dog in heat needs more than shade The more people paw prints forever on our hearts. I meet the more I like my dog. Dogs leave paw prints forever on our hearts.',
                'rating' => 5,
                'photo' => null,
                'social_link_1' => '#!',
                'social_link_2' => '#!',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Margaret Street',
                'text' => 'A dog in heat needs more than shade The more people paw prints forever on our hearts. I meet the more I like my dog. Dogs leave paw prints forever on our hearts.',
                'rating' => 5,
                'photo' => null,
                'social_link_1' => '#!',
                'social_link_2' => '#!',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Margaret Street',
                'text' => 'A dog in heat needs more than shade The more people paw prints forever on our hearts. I meet the more I like my dog. Dogs leave paw prints forever on our hearts.',
                'rating' => 5,
                'photo' => null,
                'social_link_1' => '#!',
                'social_link_2' => '#!',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}

