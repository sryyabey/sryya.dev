<?php

namespace App\Filament\Resources\CmsPageResource\Pages;

use App\Filament\Resources\CmsPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCmsPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CmsPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
