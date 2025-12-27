<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Booking Details')
                ->schema([
                    Select::make('car_id')
                        ->relationship('car', 'name')
                        ->searchable()
                        ->required(),

                    Select::make('customer_id')
                        ->relationship('customer', 'name')
                        ->searchable()
                        ->required(),

                    DatePicker::make('start_date')
                        ->required(),

                    DatePicker::make('end_date')
                        ->required()
                        ->after('start_date'),

                    TextInput::make('total_price')
                        ->numeric()
                        ->prefix('$')
                        ->required(),

                ])->columns(2),

                Section::make('Status & Payment')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'pending'   => 'Pending',
                                'confirmed'  => 'Confirmed',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'pending' => 'pending',
                                'paid'   => 'Paid',
                            ])
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
