<?php

namespace App\Filament\Resources\Bookings;

use App\Filament\Resources\Bookings\Pages\ManageBookings;
use App\Filament\Widgets\TotalCars;
use App\Models\Booking;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Bookmark;

    protected static ?string $recordTitleAttribute = 'Bookings';

    public static function getWidgets(): array
    {
        return [
            TotalCars::class,
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([  
                Section::make('Booking Details')
                ->description('Select car, customer and booking period')
                ->icon('heroicon-o-calendar-days')
                ->schema([
                    Grid::make(1)->schema([

                        Select::make('car_id')
                            ->label('Car')
                            ->relationship('car', 'brand')
                            ->searchable()
                            ->preload()
                            ->required(fn ($operation) => $operation === 'create'),

                        Select::make('customer_id')
                            ->label('Customer')
                            ->relationship('customer', 'name')
                            ->searchable()
                            ->preload()
                            ->required(fn ($operation) => $operation === 'create'),

                        DatePicker::make('start_date')
                            ->label('Pick-up Date')
                            ->required()
                            ->minDate(now())
                            ->required(fn ($operation) => $operation === 'create'),

                        DatePicker::make('end_date')
                            ->label('Return Date')
                            ->required()
                            ->after('start_date')
                            ->required(fn ($operation) => $operation === 'create'),
                    ]),
                ]),
            Section::make('Payment & Status')
                ->description('Booking and payment state')
                ->icon('heroicon-o-credit-card')
                ->schema([
                    Grid::make(1)->schema([

                        TextInput::make('total_price')
                            ->label('Total Price')
                            ->numeric()
                            ->prefix('ETB')
                            ->required(),

                        Select::make('status')
                            ->options([
                                'pending'    => 'Pending',
                                'confirmed'  => 'Confirmed',
                                'cancelled'  => 'Cancelled',
                                'completed'  => 'Completed',
                            ])
                            ->default('pending')
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'pending'   => 'Pending',
                                'paid'      => 'Paid',
                                'refunded'  => 'Refunded',
                                'failed'    => 'Failed',
                            ])
                            ->default('pending')
                            ->required(),
                    ]),
                ])
                ->collapsible(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Booking Overview')
                ->description('Car, customer and booking period details')
                ->icon('heroicon-o-calendar-days')
                ->schema([
                    Grid::make(3)->schema([

                        TextEntry::make('car.brand')
                            ->label('Car Brand')
                            ->badge(),

                        TextEntry::make('car.category')
                            ->label('Category')
                            ->badge(),

                        TextEntry::make('customer.name')
                            ->label('Customer'),

                        TextEntry::make('start_date')
                            ->label('Pick-up Date')
                            ->date(),

                        TextEntry::make('end_date')
                            ->label('Return Date')
                            ->date(),

                        TextEntry::make('total_price')
                            ->label('Total Price')
                            ->money('ETB'),
                    ]),
                ])
                ->collapsible(),

            Section::make('Payment & Status')
                ->description('Booking and payment state')
                ->icon('heroicon-o-credit-card')
                ->schema([
                    Grid::make(3)->schema([

                        TextEntry::make('status')
                            ->label('Booking Status')
                            ->badge()
                            ->color(fn (string $state) => match ($state) {
                                'pending'    => 'warning',
                                'confirmed'  => 'success',
                                'cancelled'  => 'danger',
                                'completed'  => 'primary',
                                default      => 'gray',
                            }),

                        TextEntry::make('payment_status')
                            ->label('Payment Status')
                            ->badge()
                            ->color(fn (string $state) => match ($state) {
                                'pending'   => 'warning',
                                'paid'      => 'success',
                                'refunded'  => 'info',
                                'failed'    => 'danger',
                                default     => 'gray',
                            }),

                        TextEntry::make('created_at')
                            ->label('Booked At')
                            ->dateTime(),

                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime(),
                    ]),
                ])
                ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Bookings')
            ->columns([
                TextColumn::make('car.brand')
                    ->label('Car Brand')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('customer.name')
                    // ->lable('customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('pick up date')
                    ->date()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('end_date')
                    // ->lable('return date')
                    ->date()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('total_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('booking status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'    => 'warning',
                        'confirmed'   => 'success',
                        'cancelled'   => 'danger',
                        'completed'  => 'primary',
                        default      => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'      => 'danger',
                        'paid'        => 'success',
                        'refunded'    => 'info',
                        'failed'      => 'warning',
                        default       => 'gray',
                    })
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBookings::route('/'),
        ];
    }
}
