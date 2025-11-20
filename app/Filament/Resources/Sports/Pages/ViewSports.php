<?php

namespace App\Filament\Resources\Sports\Pages;

use App\Filament\Resources\Sports\SportsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSports extends ViewRecord
{
    protected static string $resource = SportsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
