<?php

namespace App\Filament\Resources\SUVS\Schemas;

use App\Models\Car;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SUVInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextEntry::make('owner_id')->numeric(),
                        TextEntry::make('name'),
                        TextEntry::make('brand'),
                        TextEntry::make('category'),
                    ]),

                Section::make('Pricing & Specifications')
                    ->schema([
                        TextEntry::make('price_per_day')->numeric(),
                        TextEntry::make('fuel_type'),
                        TextEntry::make('transmission'),
                        TextEntry::make('seats')->numeric(),
                        TextEntry::make('year')->numeric(),
                        TextEntry::make('mileage')->numeric()->placeholder('-'),
                    ]),

                Section::make('Vehicle Identification')
                    ->schema([
                        TextEntry::make('license_plate')->placeholder('-'),
                        TextEntry::make('availability_status'),
                    ]),

                Section::make('Description')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Timestamps')
                    ->schema([
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (Car $record): bool => $record->trashed()),
                        TextEntry::make('created_at')->dateTime()->placeholder('-'),
                        TextEntry::make('updated_at')->dateTime()->placeholder('-'),
                    ]),
            ]);
    }
}
