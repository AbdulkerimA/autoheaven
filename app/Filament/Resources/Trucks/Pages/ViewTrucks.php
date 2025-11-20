<?php

namespace App\Filament\Resources\Trucks\Pages;

use App\Filament\Resources\Trucks\TrucksResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTrucks extends ViewRecord
{
    protected static string $resource = TrucksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
