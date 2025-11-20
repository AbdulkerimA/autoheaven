<?php

namespace App\Filament\Resources\Sports\Pages;

use App\Filament\Resources\Sports\SportsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSports extends ListRecords
{
    protected static string $resource = SportsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
