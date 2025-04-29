<?php

namespace App\Filament\Resources\CmsPageResource\Pages;

use App\Filament\Resources\CmsPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCmsPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CmsPageResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
