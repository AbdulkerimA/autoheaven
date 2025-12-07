<?php

namespace App\Filament\Resources\SUVS\Pages;

use App\Filament\Resources\SUVS\SUVResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSUV extends ViewRecord
{
    protected static string $resource = SUVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
