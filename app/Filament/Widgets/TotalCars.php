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
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        // dd(now()->month,Transaction::whereMonth('created_at', now()->month)->get());
        return [
             Stat::make('Total Cars', Car::count())
            ->icon('heroicon-o-truck')
            ->color('primary'),

            Stat::make('Active Rentals', Booking::where('status', 'confirmed')->count())
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Revenue This Month', 'ETB ' . number_format(Transaction::whereMonth('created_at', now()->month)->sum('amount'),2))
                ->icon('heroicon-o-currency-dollar')
                // ->chart()
                ->color('success'),
        ];
    }
}