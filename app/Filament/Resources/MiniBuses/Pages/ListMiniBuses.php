<?php

namespace App\Filament\Resources\MiniBuses\Pages;

use App\Filament\Resources\MiniBuses\MiniBusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMiniBuses extends ListRecords
{
    protected static string $resource = MiniBusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
