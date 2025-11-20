<?php

namespace App\Filament\Resources\Sedans\Pages;

use App\Filament\Resources\Sedans\SedanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSedan extends ViewRecord
{
    protected static string $resource = SedanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
