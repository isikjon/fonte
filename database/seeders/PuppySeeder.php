<?php

namespace Database\Seeders;

use App\Models\Puppy;
use Illuminate\Database\Seeder;

class PuppySeeder extends Seeder
{
    public function run(): void
    {
        $puppies = [
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Рыжий',
                'age' => '3 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'available',
                'price' => 15000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy-2',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Рыжий',
                'age' => '3 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'available',
                'price' => 15000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy-3',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Рыжий',
                'age' => '3 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'available',
                'price' => 15000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy-4',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Рыжий',
                'age' => '3 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'available',
                'price' => 15000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy-5',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Рыжий',
                'age' => '3 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'available',
                'price' => 15000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Чихуа девочка',
                'slug' => 'chihua-girl',
                'breed' => 'chihuahua',
                'gender' => 'female',
                'color' => 'Белый',
                'age' => '2 месяца',
                'coat' => 'Длинношерстный',
                'status' => 'available',
                'price' => 18000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Чихуа мальчик',
                'slug' => 'chihua-boy-7',
                'breed' => 'chihuahua',
                'gender' => 'male',
                'color' => 'Шоколадный',
                'age' => '4 месяца',
                'coat' => 'Гладкошерстный',
                'status' => 'reserved',
                'price' => 20000.00,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
                'is_new' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($puppies as $puppy) {
            Puppy::create($puppy);
        }
    }
}

