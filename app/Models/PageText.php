<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageText extends Model
{
    protected $fillable = [
        'page_key',
        'texts',
    ];

    protected $casts = [
        'texts' => 'array',
    ];

    public static function getPages(): array
    {
        return [
            'home' => 'Главная',
            'about' => 'О питомнике',
            'students' => 'Наши выпускники',
            'catalog' => 'Щенки на продажу',
            'delivery' => 'Доставка',
            'blog' => 'Блог',
            'contact' => 'Контакты',
        ];
    }

    public static function getPageFields(string $pageKey): array
    {
        $fields = [
            'home' => [
                'hero_title' => ['label' => 'Заголовок Hero', 'type' => 'text'],
                'hero_button' => ['label' => 'Текст кнопки Hero', 'type' => 'text'],
                'about_title' => ['label' => 'Заголовок "О питомнике"', 'type' => 'text'],
                'about_text_1' => ['label' => 'Текст "О питомнике" - абзац 1', 'type' => 'textarea'],
                'about_text_2' => ['label' => 'Текст "О питомнике" - абзац 2', 'type' => 'textarea'],
                'about_text_3' => ['label' => 'Текст "О питомнике" - абзац 3', 'type' => 'textarea'],
                'about_button' => ['label' => 'Текст кнопки "Подробнее"', 'type' => 'text'],
                'sell_title' => ['label' => 'Заголовок "Щенки на продажу"', 'type' => 'text'],
                'plus_1_title' => ['label' => 'Преимущество 1', 'type' => 'text'],
                'plus_2_title' => ['label' => 'Преимущество 2', 'type' => 'text'],
                'plus_3_title' => ['label' => 'Преимущество 3', 'type' => 'text'],
                'plus_4_title' => ['label' => 'Преимущество 4', 'type' => 'text'],
                'plus_5_title' => ['label' => 'Преимущество 5', 'type' => 'text'],
                'plus_6_title' => ['label' => 'Преимущество 6', 'type' => 'text'],
                'reviews_title' => ['label' => 'Заголовок "Отзывы"', 'type' => 'text'],
                'contacts_title' => ['label' => 'Заголовок "Контакты"', 'type' => 'text'],
                'contacts_address' => ['label' => 'Адрес', 'type' => 'textarea'],
                'contacts_phone' => ['label' => 'Телефон', 'type' => 'text'],
                'contacts_email' => ['label' => 'Email', 'type' => 'text'],
                'form_name_placeholder' => ['label' => 'Плейсхолдер "Имя"', 'type' => 'text'],
                'form_phone_placeholder' => ['label' => 'Плейсхолдер "Телефон"', 'type' => 'text'],
                'form_budget_placeholder' => ['label' => 'Плейсхолдер "Бюджет"', 'type' => 'text'],
                'form_message_placeholder' => ['label' => 'Плейсхолдер "Сообщение"', 'type' => 'text'],
                'form_button' => ['label' => 'Текст кнопки формы', 'type' => 'text'],
                'form_agreement' => ['label' => 'Текст согласия', 'type' => 'textarea'],
            ],
            'about' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'about_title' => ['label' => 'Заголовок "О питомнике"', 'type' => 'text'],
                'about_text_1' => ['label' => 'Текст - абзац 1', 'type' => 'textarea'],
                'about_text_2' => ['label' => 'Текст - абзац 2', 'type' => 'textarea'],
                'about_text_3' => ['label' => 'Текст - абзац 3', 'type' => 'textarea'],
                'about_text_4' => ['label' => 'Текст - абзац 4', 'type' => 'textarea'],
                'about_text_5' => ['label' => 'Текст - абзац 5', 'type' => 'textarea'],
                'about_signature' => ['label' => 'Подпись', 'type' => 'text'],
                'plus_1_title' => ['label' => 'Преимущество 1 - заголовок', 'type' => 'text'],
                'plus_1_text' => ['label' => 'Преимущество 1 - текст', 'type' => 'textarea'],
                'plus_2_title' => ['label' => 'Преимущество 2 - заголовок', 'type' => 'text'],
                'plus_2_text' => ['label' => 'Преимущество 2 - текст', 'type' => 'textarea'],
                'plus_3_title' => ['label' => 'Преимущество 3 - заголовок', 'type' => 'text'],
                'plus_3_text' => ['label' => 'Преимущество 3 - текст', 'type' => 'textarea'],
                'plus_4_title' => ['label' => 'Преимущество 4 - заголовок', 'type' => 'text'],
                'plus_4_text' => ['label' => 'Преимущество 4 - текст', 'type' => 'textarea'],
                'plus_5_title' => ['label' => 'Преимущество 5 - заголовок', 'type' => 'text'],
                'plus_5_text' => ['label' => 'Преимущество 5 - текст', 'type' => 'textarea'],
                'plus_6_title' => ['label' => 'Преимущество 6 - заголовок', 'type' => 'text'],
                'plus_6_text' => ['label' => 'Преимущество 6 - текст', 'type' => 'textarea'],
                'certificates_title' => ['label' => 'Заголовок "Сертификаты"', 'type' => 'text'],
            ],
            'students' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'photos_title' => ['label' => 'Заголовок "Фотоотчеты"', 'type' => 'text'],
                'videos_title' => ['label' => 'Заголовок "Видеоприветы"', 'type' => 'text'],
                'reviews_title' => ['label' => 'Заголовок "Отзывы"', 'type' => 'text'],
            ],
            'catalog' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'catalog_title' => ['label' => 'Заголовок каталога', 'type' => 'text'],
            ],
            'delivery' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'delivery_title' => ['label' => 'Заголовок "Доставка"', 'type' => 'text'],
                'delivery_text_1' => ['label' => 'Текст - абзац 1', 'type' => 'textarea'],
                'delivery_text_2' => ['label' => 'Текст - абзац 2', 'type' => 'textarea'],
                'delivery_text_3' => ['label' => 'Текст - абзац 3', 'type' => 'textarea'],
                'delivery_quote' => ['label' => 'Цитата', 'type' => 'textarea'],
            ],
            'blog' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'blog_title' => ['label' => 'Заголовок блога', 'type' => 'text'],
            ],
            'contact' => [
                'banner_title' => ['label' => 'Заголовок баннера', 'type' => 'text'],
                'banner_text' => ['label' => 'Текст баннера', 'type' => 'textarea'],
                'faq_title' => ['label' => 'Заголовок FAQ', 'type' => 'text'],
                'contacts_title' => ['label' => 'Заголовок "Контакты"', 'type' => 'text'],
                'phone_label' => ['label' => 'Лейбл "Телефон"', 'type' => 'text'],
                'phone' => ['label' => 'Телефон', 'type' => 'text'],
                'email_label' => ['label' => 'Лейбл "Email"', 'type' => 'text'],
                'email' => ['label' => 'Email', 'type' => 'text'],
                'address_label' => ['label' => 'Лейбл "Адрес"', 'type' => 'text'],
                'address' => ['label' => 'Адрес', 'type' => 'textarea'],
                'form_name_placeholder' => ['label' => 'Плейсхолдер "Имя"', 'type' => 'text'],
                'form_phone_placeholder' => ['label' => 'Плейсхолдер "Телефон"', 'type' => 'text'],
                'form_budget_placeholder' => ['label' => 'Плейсхолдер "Бюджет"', 'type' => 'text'],
                'form_message_placeholder' => ['label' => 'Плейсхолдер "Сообщение"', 'type' => 'text'],
                'form_button' => ['label' => 'Текст кнопки формы', 'type' => 'text'],
                'form_agreement' => ['label' => 'Текст согласия', 'type' => 'textarea'],
            ],
        ];

        return $fields[$pageKey] ?? [];
    }

    public static function getText(string $pageKey, string $field, string $default = ''): string
    {
        static $cache = [];
        
        if (!isset($cache[$pageKey])) {
            $page = self::where('page_key', $pageKey)->first();
            $cache[$pageKey] = $page?->texts ?? [];
        }

        return $cache[$pageKey][$field] ?? $default;
    }
}
