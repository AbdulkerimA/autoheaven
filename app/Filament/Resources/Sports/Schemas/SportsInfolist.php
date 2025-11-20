<?php

namespace App\Filament\Resources\Sports\Schemas;

use App\Models\Car;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SportsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('owner_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('brand'),
                TextEntry::make('category'),
                TextEntry::make('price_per_day')
                    ->numeric(),
                TextEntry::make('fuel_type'),
                TextEntry::make('transmission'),
                TextEntry::make('seats')
                    ->numeric(),
                TextEntry::make('year')
                    ->numeric(),
                TextEntry::make('mileage')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('license_plate')
                    ->placeholder('-'),
                TextEntry::make('availability_status'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Car $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
