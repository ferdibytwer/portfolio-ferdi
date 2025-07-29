<?php

namespace App\Filament\Resources\SertifResource\Pages;

use App\Filament\Resources\SertifResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertif extends EditRecord
{
    protected static string $resource = SertifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
