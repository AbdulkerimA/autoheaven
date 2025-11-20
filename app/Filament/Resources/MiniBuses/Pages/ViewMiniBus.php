<?php

namespace App\Filament\Resources\MiniBuses\Pages;

use App\Filament\Resources\MiniBuses\MiniBusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMiniBus extends ViewRecord
{
    protected static string $resource = MiniBusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
