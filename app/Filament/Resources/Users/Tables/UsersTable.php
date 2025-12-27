<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile.profile_picture')
                    ->label('profile pic')
                    ->size(50)
                    ->disk('public')
                    ->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('username')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('profile.phone'),
                TextColumn::make('profile.role')->label('Role'),
                BadgeColumn::make('deleted_at')->label('Status')
                    ->colors([
                        'success' => null,  // active
                        'danger' => fn ($state) => $state !== null, // deleted
                    ])
                    ->formatStateUsing(fn ($state) => $state ? 'Deleted' : 'Active'),
            ])
             ->filters([
                SelectFilter::make('profile.role')
                    ->options([
                        'admin' => 'Admin',
                        'owner' => 'Owner',
                        'customer' => 'Customer',
                    ]),

                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
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
