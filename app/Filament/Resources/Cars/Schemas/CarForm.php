<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Car Information')
                    ->schema([
                        TextInput::make('name')
                            ->required(),

                        TextInput::make('brand')
                            ->required(),

                        Select::make('category')
                            ->options([
                                'SUV' => 'SUV',
                                'Sedan' => 'Sedan',
                                'Hatchback' => 'Hatchback',
                                'Convertible' => 'Convertible',
                                'Pickup Truck' => 'Pickup Truck',
                                'Van' => 'Van',
                                'Sports Car' => 'Sports Car',
                                'Luxury' => 'Luxury',
                            ])
                            ->required(),

                        TextInput::make('license_plate')
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('year')
                            ->numeric()
                            ->minValue(1990)
                            ->required(),

                        TextInput::make('seats')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Technical Details')
                    ->schema([
                        Select::make('fuel_type')
                            ->options([
                                'petrol' => 'Petrol',
                                'Diesel' => 'Diesel',
                                'electric' => 'Electric',
                                'hybrid' => 'Hybrid',
                            ])
                            ->required(),

                        Select::make('transmission')
                            ->options([
                                'manual' => 'Manual',
                                'automatic' => 'Automatic',
                            ])
                            ->required(),

                        TextInput::make('mileage')
                            ->numeric(),
                            // ->suffix('km'),
                    ])
                    ->columns(1),

                Section::make('Pricing & Status')
                    ->schema([
                        TextInput::make('price_per_day')
                            ->numeric()
                            ->prefix('$')
                            ->required(),

                        Select::make('availability_status')
                            ->options([
                                'available'   => 'Available',
                                'booked'      => 'Booked',
                                'maintenance' => 'Maintenance',
                            ])
                            ->required(),

                        Select::make('owner_id')
                            ->relationship('owner', 'name')
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->rows(4),
                    ]),
            ]);
    }
}
