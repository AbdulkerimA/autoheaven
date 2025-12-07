<?php

namespace App\Filament\Resources\SportsCars\Pages;

use App\Filament\Resources\SportsCars\SportsCarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSportsCars extends ManageRecords
{
    protected static string $resource = SportsCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
