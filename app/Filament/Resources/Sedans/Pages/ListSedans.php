<?php

namespace App\Filament\Resources\Sedans\Pages;

use App\Filament\Resources\Sedans\SedanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSedans extends ListRecords
{
    protected static string $resource = SedanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
