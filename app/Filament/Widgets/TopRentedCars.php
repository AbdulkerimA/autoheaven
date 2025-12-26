<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class TopRentedCars extends TableWidget
{
    protected static ?string $heading = 'Top Rented Cars';
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 2;

    protected function getTableQuery(): Builder|Relation|null
    {
        // Get cars ordered by number of bookings
        return Car::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('Car Name')->sortable(),
            TextColumn::make('brand')->label('Brand')->sortable(),
            TextColumn::make('bookings_count')
                ->label('Bookings')
                ->sortable()
                ->counts('bookings'),
            BadgeColumn::make('availability_status')
                ->label('Status')
                ->colors([
                    'success' => 'available',
                    'warning' => 'maintenance',
                    'primary' => 'booked',
                ]),
        ];
    }
}
