<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class EditDocumentFiles extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-paper-clip';
    }

    public static function getNavigationLabel(): string
    {
        return 'Файлы документов';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 12;
    }

    public function getView(): string
    {
        return 'filament.pages.edit-document-files';
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'offer_ru' => Setting::get('doc_offer_ru'),
            'offer_en' => Setting::get('doc_offer_en'),
            'sale_ru' => Setting::get('doc_sale_ru'),
            'sale_en' => Setting::get('doc_sale_en'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Договор оферты')
                    ->description('Файлы договора оферты для скачивания')
                    ->schema([
                        FileUpload::make('offer_ru')
                            ->label('Договор оферты (RU)')
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                        FileUpload::make('offer_en')
                            ->label('Договор оферты (EN)')
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),
                    ]),

                Section::make('Договор купли-продажи')
                    ->description('Файлы договора купли-продажи для скачивания')
                    ->schema([
                        FileUpload::make('sale_ru')
                            ->label('Договор купли-продажи (RU)')
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                        FileUpload::make('sale_en')
                            ->label('Договор купли-продажи (EN)')
                            ->disk('public')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('doc_offer_ru', $data['offer_ru'] ?? null);
        Setting::set('doc_offer_en', $data['offer_en'] ?? null);
        Setting::set('doc_sale_ru', $data['sale_ru'] ?? null);
        Setting::set('doc_sale_en', $data['sale_en'] ?? null);

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

