<?php

namespace App\Filament\Resources\Trucks\Pages;

use App\Filament\Resources\Trucks\TrucksResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrucks extends ListRecords
{
    protected static string $resource = TrucksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
