<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('TX ID')
                    ->sortable(),

                TextColumn::make('booking.id')
                    ->label('Booking'),

                TextColumn::make('booking.customer.name')
                    ->label('Customer')
                    ->searchable(),

                TextColumn::make('booking.car.name')
                    ->label('Car'),

                TextColumn::make('amount')
                    ->money('ETB')
                    ->sortable(),

                BadgeColumn::make('payment_method')
                    ->colors([
                        'primary' => 'cash',
                        'success' => 'card',
                        'warning' => 'bank',
                        'gray' => 'admin',
                    ]),

                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'completed',
                        'warning' => 'pending',
                        'danger'  => 'failed',
                    ]),

                TextColumn::make('reference')
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'paid' => 'Paid',
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                    ]),

                SelectFilter::make('payment_method')
                    ->options([
                        'cash' => 'Cash',
                        'card' => 'Card',
                        'bank' => 'Bank',
                        'admin' => 'Admin',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
