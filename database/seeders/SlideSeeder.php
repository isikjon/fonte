<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Собаки - наша жизнь',
                'subtitle' => null,
                'button_text' => 'Щенки на продажу',
                'button_link' => '/catalog',
                'image' => null,
                'is_active' => true,
                'sort_order' => 0,
            ],
            [
                'title' => 'Собаки - наша жизнь',
                'subtitle' => null,
                'button_text' => 'Щенки на продажу',
                'button_link' => '/catalog',
                'image' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Собаки - наша жизнь',
                'subtitle' => null,
                'button_text' => 'Щенки на продажу',
                'button_link' => '/catalog',
                'image' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($slides as $slide) {
            Slide::create($slide);
        }
    }
}
