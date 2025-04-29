<?php

namespace App\Filament\Resources\CmsCategoryResource\Pages;

use App\Filament\Resources\CmsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCmsCategory extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CmsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            // ...
        ];
    }
}
