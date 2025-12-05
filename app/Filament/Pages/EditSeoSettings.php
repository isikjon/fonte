<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditSeoSettings extends Page
{
    protected string $view = 'filament.pages.edit-seo-settings';

    public ?string $site_name = null;
    public ?string $site_title = null;
    public ?string $site_description = null;
    public ?string $meta_keywords = null;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-magnifying-glass';
    }

    public static function getNavigationLabel(): string
    {
        return 'SEO настройки';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 10;
    }

    public function getTitle(): string
    {
        return 'SEO настройки сайта';
    }

    public function mount(): void
    {
        $this->site_name = Setting::get('site_name', 'Fonte di Joy — Питомник');
        $this->site_title = Setting::get('site_title', 'Fonte di Joy — Питомник чихуахуа');
        $this->site_description = Setting::get('site_description', 'Профессиональный питомник чихуахуа. Щенки на продажу, доставка по всему миру.');
        $this->meta_keywords = Setting::get('meta_keywords', '');
    }

    public function schema(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основные настройки')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Название сайта')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Отображается в шапке и подвале сайта'),

                        TextInput::make('site_title')
                            ->label('Title по умолчанию')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Заголовок страницы в браузере (тег title)'),
                    ]),

                Section::make('Мета-теги')
                    ->schema([
                        Textarea::make('site_description')
                            ->label('Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Описание сайта для поисковых систем (рекомендуется 150-160 символов)'),

                        Textarea::make('meta_keywords')
                            ->label('Keywords')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Ключевые слова через запятую (необязательно)'),
                    ]),
            ]);
    }

    public function save(): void
    {
        Setting::set('site_name', $this->site_name);
        Setting::set('site_title', $this->site_title);
        Setting::set('site_description', $this->site_description);
        Setting::set('meta_keywords', $this->meta_keywords);

        Notification::make()
            ->title('SEO настройки сохранены')
            ->success()
            ->send();
    }
}
