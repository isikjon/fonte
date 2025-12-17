<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogBannerResource\Pages;
use App\Models\BlogBanner;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogBannerResource extends Resource
{
    protected static ?string $model = BlogBanner::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-photo';
    }

    public static function getNavigationLabel(): string
    {
        return 'Баннеры для блога';
    }

    public static function getModelLabel(): string
    {
        return 'Баннер';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Баннеры';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('subtitle')
                    ->label('Текст баннера')
                    ->required()
                    ->rows(3)
                    ->helperText('Текст отображается отдельным слоем в выделенном блоке с серым фоном и красной левой границей'),

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
                TextColumn::make('subtitle')
                    ->label('Текст баннера')
                    ->searchable()
                    ->limit(50)
                    ->wrap()
                    ->placeholder('—'),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable()
                    ->default(0),
            ])
            ->defaultSort('sort_order', 'asc')
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
            'index' => Pages\ListBlogBanners::route('/'),
            'create' => Pages\CreateBlogBanner::route('/create'),
            'edit' => Pages\EditBlogBanner::route('/{record}/edit'),
        ];
    }
}

