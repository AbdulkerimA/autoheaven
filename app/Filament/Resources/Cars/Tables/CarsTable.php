<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('brand')
                    ->sortable(),

                TextColumn::make('license_plate')
                    ->searchable(),

                TextColumn::make('owner.name')
                    ->label('Owner')
                    ->searchable(),

                TextColumn::make('price_per_day')
                    ->money('USD'),

                BadgeColumn::make('availability_status')
                    ->colors([
                        'success' => 'available',
                        'warning' => 'booked',
                        'warning' => 'maintenance',
                    ]),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('availability_status')
                    ->options([
                        'available'   => 'Available',
                        'booked'      => 'Booked',
                        'maintenance' => 'Maintenance',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
