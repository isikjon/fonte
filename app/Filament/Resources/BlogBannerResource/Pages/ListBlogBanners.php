<?php

namespace App\Filament\Resources\BlogBannerResource\Pages;

use App\Filament\Resources\BlogBannerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBlogBanners extends ListRecords
{
    protected static string $resource = BlogBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

