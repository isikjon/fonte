<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class EditSiteImages extends Page
{
    protected string $view = 'filament.pages.edit-site-images';

    public ?string $home_about_image = null;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    public static function getNavigationLabel(): string
    {
        return 'О нашем питомнике';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public function getTitle(): string
    {
        return 'О нашем питомнике';
    }

    public function mount(): void
    {
        $this->home_about_image = Setting::get('home_about_image');
    }

    public function schema(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Главная страница')
                    ->schema([
                        FileUpload::make('home_about_image')
                            ->label('Фото секции "О нашем питомнике"')
                            ->helperText('Рекомендуемый размер: 600x700px')
                            ->image()
                            ->directory('site')
                            ->imageEditor(),
                    ]),
            ]);
    }

    public function save(): void
    {
        Setting::set('home_about_image', $this->home_about_image);

        Notification::make()
            ->title('Изображения сохранены')
            ->success()
            ->send();
    }
}
