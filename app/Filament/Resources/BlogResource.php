<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Awcodes\TiptapEditor\Components\TiptapEditor;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-newspaper';
    }

    public static function getNavigationLabel(): string
    {
        return 'Блог';
    }

    public static function getModelLabel(): string
    {
        return 'Статья';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Статьи';
    }

    public static function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('photo')
                    ->label('Обложка для списка')
                    ->image()
                    ->disk('public')
                    ->directory('blog')
                    ->imageEditor(),

                TextInput::make('slug')
                    ->label('URL (slug)')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Textarea::make('description')
                    ->label('Краткое описание')
                    ->rows(3),

                TiptapEditor::make('content')
                    ->label('Полный текст статьи')
                    ->profile('default')
                    ->disk('public')
                    ->directory('blog/content')
                    ->tools([
                        'heading',
                        'paragraph',
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'blockquote',
                        'codeBlock',
                        'bulletList',
                        'orderedList',
                        'horizontalRule',
                        'image',
                        'attachFiles',
                        'textAlign',
                        'color',
                        'undo',
                        'redo',
                    ])
                    ->colors([
                        '#e53935',
                        '#333333',
                        '#808080',
                    ])
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Активна')
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

                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->limit(50),

                TextColumn::make('description')
                    ->label('Описание')
                    ->limit(50),

                IconColumn::make('is_active')
                    ->label('Активна')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Создана')
                    ->dateTime('d.m.Y')
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}

