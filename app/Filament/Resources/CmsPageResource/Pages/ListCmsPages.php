<?php

namespace App\Filament\Resources\CmsPageResource\Pages;

use App\Filament\Resources\CmsPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCmsPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CmsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
