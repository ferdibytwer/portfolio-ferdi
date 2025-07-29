<?php

namespace App\Filament\Resources\SertifResource\Pages;

use App\Filament\Resources\SertifResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSertifs extends ListRecords
{
    protected static string $resource = SertifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
