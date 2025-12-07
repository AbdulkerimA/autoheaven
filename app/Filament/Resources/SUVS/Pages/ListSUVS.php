<?php

namespace App\Filament\Resources\SUVS\Pages;

use App\Filament\Resources\SUVS\SUVResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSUVS extends ListRecords
{
    protected static string $resource = SUVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
