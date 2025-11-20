<?php

namespace App\Filament\Resources\MiniBuses\Pages;

use App\Filament\Resources\MiniBuses\MiniBusResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMiniBus extends EditRecord
{
    protected static string $resource = MiniBusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
