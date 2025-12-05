<?php

namespace App\Filament\Resources\Cars\Schemas;

use App\Models\User;
use Filament\Forms\Components\FileUpload;
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
                 Section::make('Basic Information')
                    ->schema([
                        // Owner select: only users with role 'owner'
                        Select::make('owner_id')
                            ->label('Owner')
                            ->required()
                            ->options(function () {
                                return User::whereHas('profile', function ($query) {
                                    $query->where('role', 'owner');
                                })->pluck('username', 'id'); // username as label, id as value
                            }),

                        TextInput::make('name')
                            ->label('car model')
                            ->required(),

                        TextInput::make('brand')
                            ->required(),

                        // Category select
                        Select::make('category')
                            ->required()
                            ->options([
                                'Sedan' => 'Sedan',
                                'SUV' => 'SUV',
                                'Hatchback' => 'Hatchback',
                                'Truck' => 'Truck',
                                'Van' => 'Van',
                                // add more categories as needed
                            ]),
                    ]),

                Section::make('Pricing & Specifications')
                    ->schema([
                        TextInput::make('price_per_day')
                            ->required()
                            ->numeric(),

                        // Fuel type select
                        Select::make('fuel_type')
                            ->required()
                            ->options([
                                'Petrol' => 'Petrol',
                                'Diesel' => 'Diesel',
                                'Electric' => 'Electric',
                                'Hybrid' => 'Hybrid',
                            ]),

                        // Transmission select
                        Select::make('transmission')
                            ->required()
                            ->options([
                                'Manual' => 'Manual',
                                'Automatic' => 'Automatic',
                            ]),

                        TextInput::make('seats')
                            ->required()
                            ->numeric(),

                        TextInput::make('year')
                            ->required()
                            ->numeric(),

                        TextInput::make('mileage')
                            ->numeric(),
                    ]),

                Section::make('Vehicle Identification')
                    ->schema([
                        TextInput::make('license_plate'),
                        TextInput::make('availability_status')
                            ->required()
                            ->default('available'),
                    ]),

                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->columnSpanFull(),
                    ]),

                FileUpload::make('car_images')
                ->label('Car Image')
                ->image()
                ->directory('cars')
                ->multiple()
                ->preserveFilenames()
                ->required(),
            ]);
    }
}
