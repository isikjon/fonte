<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'social_instagram' => 'https://instagram.com/',
            'social_facebook' => 'https://facebook.com/',
            'social_vk' => 'https://vk.com/',
            'social_youtube' => 'https://youtube.com/',
            'social_odnoklassniki' => 'https://ok.ru/',
            'social_telegram' => 'https://t.me/',
            'social_whatsapp' => 'https://wa.me/',
            'social_viber' => '',
            'site_name' => 'Fonte di Joy — Питомник',
            'site_title' => 'Fonte di Joy — Питомник чихуахуа',
            'site_description' => 'Профессиональный питомник чихуахуа. Щенки на продажу, доставка по всему миру.',
            'meta_keywords' => 'чихуахуа, питомник, щенки, купить щенка',
        ];

        foreach ($settings as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}

