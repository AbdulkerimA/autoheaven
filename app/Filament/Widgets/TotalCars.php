<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalCars extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '10s';
    protected static ?int $sortOrder = 2;

    protected function getStats(): array
    {
        return [
             Stat::make('Total Cars', Car::count())
            ->icon('heroicon-o-truck')
            ->color('primary'),

            Stat::make('Active Rentals', Booking::where('availability_status', 'booked')->count())
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Revenue This Month', '$' . Transaction::whereMonth('created_at', now())->sum('amount'))
                ->icon('heroicon-o-currency-dollar')
                ->color('success'),
        ];
    }
}