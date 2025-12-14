<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class EditSocialLinks extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-share';
    }

    public static function getNavigationLabel(): string
    {
        return 'Социальные сети';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 10;
    }

    public function getView(): string
    {
        return 'filament.pages.edit-social-links';
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'instagram' => Setting::get('social_instagram'),
            'facebook' => Setting::get('social_facebook'),
            'vk' => Setting::get('social_vk'),
            'youtube' => Setting::get('social_youtube'),
            'odnoklassniki' => Setting::get('social_odnoklassniki'),
            'telegram' => Setting::get('social_telegram'),
            'whatsapp' => Setting::get('social_whatsapp'),
            'max' => Setting::get('social_max') ?: Setting::get('social_viber'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Социальные сети')
                    ->description('Ссылки на страницы в социальных сетях')
                    ->schema([
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url()
                            ->placeholder('https://instagram.com/...'),

                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url()
                            ->placeholder('https://facebook.com/...'),

                        TextInput::make('vk')
                            ->label('ВКонтакте')
                            ->url()
                            ->placeholder('https://vk.com/...'),

                        TextInput::make('youtube')
                            ->label('YouTube')
                            ->url()
                            ->placeholder('https://youtube.com/...'),

                        TextInput::make('odnoklassniki')
                            ->label('Одноклассники')
                            ->url()
                            ->placeholder('https://ok.ru/...'),
                    ]),

                Section::make('Мессенджеры')
                    ->description('Ссылки для связи через мессенджеры')
                    ->schema([
                        TextInput::make('telegram')
                            ->label('Telegram')
                            ->url()
                            ->placeholder('https://t.me/...'),

                        TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->placeholder('https://wa.me/...'),

                        TextInput::make('max')
                            ->label('Max')
                            ->url()
                            ->placeholder('https://max.me/...'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('social_instagram', $data['instagram'] ?? null);
        Setting::set('social_facebook', $data['facebook'] ?? null);
        Setting::set('social_vk', $data['vk'] ?? null);
        Setting::set('social_youtube', $data['youtube'] ?? null);
        Setting::set('social_odnoklassniki', $data['odnoklassniki'] ?? null);
        Setting::set('social_telegram', $data['telegram'] ?? null);
        Setting::set('social_whatsapp', $data['whatsapp'] ?? null);
        Setting::set('social_max', $data['max'] ?? null);

        Notification::make()
            ->title('Сохранено!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Сохранить')
                ->submit('save'),
        ];
    }
}

