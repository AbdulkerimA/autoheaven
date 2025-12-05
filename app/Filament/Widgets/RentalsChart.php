<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class RentalsChart extends ChartWidget
{
    protected ?string $heading = 'Rentals Chart';
    protected ?string $pollingInterval = '10s';
    protected static ?int $sortOrder = 4;


    protected function getData(): array
    {
        // Initialize all 12 months with 0
        $monthlyTotals = array_fill(1, 12, 0);

        // Fetch booking counts grouped by month (SQLite syntax)
        $bookings = Booking::selectRaw("CAST(strftime('%m', created_at) AS INTEGER) as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Populate monthlyTotals array
        foreach ($bookings as $booking) {
            $monthlyTotals[$booking->month] = $booking->total;
        }

        // Convert to zero-indexed array for Filament chart
        $data = array_values($monthlyTotals);

        // dd($data);
        return [
            'datasets' => [
                [
                    'name' => 'Rentals',
                    'data' => $data,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}