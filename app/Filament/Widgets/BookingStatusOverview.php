<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingStatusOverview extends ChartWidget
{
    protected ?string $heading = 'Booking Status Overview';
    protected static ?int $sort = 1; // Order in dashboard

    protected function getData(): array
    {
         // Count bookings per status
        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        $data = [];

        foreach ($statuses as $status) {
            $data[$status] = Booking::where('status', $status)->count();
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#f59e0b', // pending - amber
                        '#10b981', // approved - green
                        '#3b82f6', // completed - blue
                        '#ef4444', // cancelled - red
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
