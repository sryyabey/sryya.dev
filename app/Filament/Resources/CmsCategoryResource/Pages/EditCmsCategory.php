<?php

namespace App\Filament\Resources\CmsCategoryResource\Pages;

use App\Filament\Resources\CmsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCmsCategory extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CmsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
