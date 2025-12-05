<?php

namespace App\Filament\Pages;

use App\Models\PageText;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EditPageTexts extends Page
{
    protected string $view = 'filament.pages.edit-page-texts';

    public ?string $selectedPage = null;
    public array $texts = [];

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationLabel(): string
    {
        return 'Тексты страниц';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public function getTitle(): string
    {
        return 'Редактирование текстов страниц';
    }

    public function mount(): void
    {
        $this->selectedPage = 'home';
        $this->loadPageTexts();
    }

    public function schema(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Страница')
                    ->schema([
                        Select::make('selectedPage')
                            ->label('Выберите страницу')
                            ->options(PageText::getPages())
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state) {
                                $this->selectedPage = $state;
                                $this->loadPageTexts();
                            }),
                    ]),

                Section::make('Тексты')
                    ->schema(fn () => $this->getTextFields())
                    ->visible(fn () => $this->selectedPage !== null),
            ]);
    }

    protected function getTextFields(): array
    {
        if (!$this->selectedPage) {
            return [];
        }

        $fields = PageText::getPageFields($this->selectedPage);
        $components = [];

        foreach ($fields as $key => $config) {
            $defaultValue = $this->texts[$key] ?? '';
            
            $component = match ($config['type']) {
                'textarea' => Textarea::make("texts.{$key}")
                    ->label($config['label'])
                    ->rows(4)
                    ->default($defaultValue),
                'richtext' => RichEditor::make("texts.{$key}")
                    ->label($config['label'])
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'orderedList',
                    ])
                    ->default($defaultValue),
                default => TextInput::make("texts.{$key}")
                    ->label($config['label'])
                    ->default($defaultValue),
            };

            $components[] = $component;
        }

        return $components;
    }

    public function loadPageTexts(): void
    {
        if (!$this->selectedPage) {
            $this->texts = [];
            return;
        }

        $pageText = PageText::where('page_key', $this->selectedPage)->first();
        $this->texts = $pageText?->texts ?? [];
    }

    public function save(): void
    {
        if (!$this->selectedPage) {
            return;
        }

        PageText::updateOrCreate(
            ['page_key' => $this->selectedPage],
            ['texts' => $this->texts]
        );

        Notification::make()
            ->title('Сохранено')
            ->success()
            ->send();
    }
}
