<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class RecentUsers extends TableWidget
{
    protected static ?string $heading = 'Recent Users';
    protected static ?int $sort = 5;
    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder|Relation|null
    {
        return User::latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('profile_picture')->label('Avatar')->circular()->disk('public'),
            TextColumn::make('name')->sortable(),
            TextColumn::make('email')->sortable(),
            TextColumn::make('profile.role')->label('Role'),
            TextColumn::make('created_at')->dateTime('M d, Y'),
        ];
    }
}
