<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PuppyResource\Pages;
use App\Models\Puppy;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PuppyResource extends Resource
{
    protected static ?string $model = Puppy::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-heart';
    }

    public static function getNavigationLabel(): string
    {
        return 'Щенки';
    }

    public static function getModelLabel(): string
    {
        return 'Щенок';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Щенки';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Имя')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('URL (slug)')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('breed')
                    ->label('Порода')
                    ->maxLength(255)
                    ->default('Чихуахуа'),

                Select::make('gender')
                    ->label('Пол')
                    ->options([
                        'male' => 'Кобель',
                        'female' => 'Сука',
                    ]),

                TextInput::make('color')
                    ->label('Окрас')
                    ->maxLength(255),

                TextInput::make('age')
                    ->label('Возраст')
                    ->maxLength(255),

                TextInput::make('coat')
                    ->label('Шерсть')
                    ->maxLength(255),

                Select::make('status')
                    ->label('Статус')
                    ->options([
                        'available' => 'В продаже',
                        'reserved' => 'Зарезервирован',
                        'sold' => 'Продан',
                    ])
                    ->default('available'),

                TextInput::make('price')
                    ->label('Цена ($)')
                    ->numeric()
                    ->prefix('$')
                    ->default(0),

                Textarea::make('catalog_short_description')
                    ->label('Краткое описание для каталога')
                    ->helperText('Отображается в каталоге и на главной странице')
                    ->rows(2),

                Textarea::make('banner_description')
                    ->label('Краткое описание для баннера')
                    ->helperText('Отображается в баннере на странице щенка')
                    ->rows(2),

                Textarea::make('full_description')
                    ->label('Подробное описание в карточке щенка')
                    ->helperText('Отображается в подробной информации на странице щенка')
                    ->rows(4),

                FileUpload::make('photo')
                    ->label('Главное фото/видео')
                    ->disk('public')
                    ->directory('puppies')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'video/mp4', 'video/webm', 'video/quicktime'])
                    ->maxSize(262144),

                FileUpload::make('gallery')
                    ->label('Галерея')
                    ->disk('public')
                    ->multiple()
                    ->directory('puppies/gallery')
                    ->reorderable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'video/mp4', 'video/webm', 'video/quicktime'])
                    ->maxSize(262144),

                Toggle::make('is_new')
                    ->label('Новинка')
                    ->default(false),

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
                ImageColumn::make('photo')
                    ->label('Фото')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),

                TextColumn::make('gender')
                    ->label('Пол')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'male' => 'Кобель',
                        'female' => 'Сука',
                        default => $state,
                    }),

                TextColumn::make('price')
                    ->label('Цена')
                    ->money('USD'),

                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'reserved' => 'warning',
                        'sold' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'available' => 'В продаже',
                        'reserved' => 'Зарезервирован',
                        'sold' => 'Продан',
                        default => $state,
                    }),

                IconColumn::make('is_new')
                    ->label('Новинка')
                    ->boolean(),

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
            'index' => Pages\ListPuppies::route('/'),
            'create' => Pages\CreatePuppy::route('/create'),
            'edit' => Pages\EditPuppy::route('/{record}/edit'),
        ];
    }
}
