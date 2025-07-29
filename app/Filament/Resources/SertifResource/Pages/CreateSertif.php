<?php

namespace App\Filament\Resources\SertifResource\Pages;

use App\Filament\Resources\SertifResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSertif extends CreateRecord
{
    protected static string $resource = SertifResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
