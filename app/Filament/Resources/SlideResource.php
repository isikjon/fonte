<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Models\Slide;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    public static function getNavigationLabel(): string
    {
        return 'Слайды';
    }

    public static function getModelLabel(): string
    {
        return 'Слайд';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Слайды';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Заголовок (H1)')
                    ->maxLength(255),

                Textarea::make('subtitle')
                    ->label('Подзаголовок (P)')
                    ->rows(2)
                    ->maxLength(500),

                TextInput::make('button_text')
                    ->label('Текст кнопки')
                    ->required()
                    ->maxLength(255),

                TextInput::make('button_link')
                    ->label('Ссылка кнопки')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Фоновое изображение')
                    ->image()
                    ->disk('public')
                    ->directory('slides')
                    ->imageEditor()
                    ->maxSize(1048576),

                ViewField::make('image_recommendation')
                    ->label('')
                    ->view('filament.forms.components.image-recommendation'),

                Toggle::make('is_active')
                    ->label('Активен')
                    ->default(true),

                TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Изображение'),

                TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('button_text')
                    ->label('Кнопка')
                    ->limit(20),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}
