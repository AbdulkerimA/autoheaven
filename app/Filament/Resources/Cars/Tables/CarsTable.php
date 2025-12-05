<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('owner.username')
                    ->label('owner name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('license_plate')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable()
                    ->searchable(),
                TextColumn::make('price_per_day')
                    ->numeric()
                    ->sortable()
                    ->prefix('ETB '),
                TextColumn::make('fuel_type')
                    ->searchable(),
                TextColumn::make('transmission')
                    ->searchable(),
                TextColumn::make('year')
                    ->label('build year')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('availability_status')
                    ->label('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                            'pending'    => 'warning',
                            'available'   => 'success',
                            'booked'   => 'danger',
                            'maintenance'   => 'danger',
                            'completed'  => 'primary',
                            default      => 'gray',
                        })
                    ->searchable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
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
