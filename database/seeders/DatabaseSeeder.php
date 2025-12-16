<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PageTextSeeder::class,
            ReviewSeeder::class,
            PuppySeeder::class,
            BlogSeeder::class,
            DocumentSeeder::class,
            SettingSeeder::class,
            SlideSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
