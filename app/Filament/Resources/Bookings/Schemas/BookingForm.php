<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('car_id')
                    ->required()
                    ->numeric(),
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('total_price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_status')
                    ->required()
                    ->default('pending'),
            ]);
    }
}
