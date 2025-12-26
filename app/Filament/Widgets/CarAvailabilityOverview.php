<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use Filament\Widgets\ChartWidget;

class CarAvailabilityOverview extends ChartWidget
{
    protected ?string $heading = 'Car Availability Overview';
    protected static ?int $sort = 2; 

    protected function getData(): array
    {
        $statuses = ['available', 'booked', 'maintenance'];
        $data = [];

        foreach ($statuses as $status) {
            $data[$status] = Car::where('availability_status', $status)->count();
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Cars',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#10b981', // available - green
                        '#3b82f6', // booked - blue
                        '#f59e0b', // maintenance - amber
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
