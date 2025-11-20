<?php

namespace App\Filament\Resources\MiniBuses\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MiniBusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('owner_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('brand')
                    ->required(),
                TextInput::make('category')
                    ->required(),
                TextInput::make('price_per_day')
                    ->required()
                    ->numeric(),
                TextInput::make('fuel_type')
                    ->required(),
                TextInput::make('transmission')
                    ->required(),
                TextInput::make('seats')
                    ->required()
                    ->numeric(),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                TextInput::make('mileage')
                    ->numeric(),
                TextInput::make('license_plate'),
                TextInput::make('availability_status')
                    ->required()
                    ->default('available'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
