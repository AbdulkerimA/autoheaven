<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use Filament\Widgets\ChartWidget;

class CarStatusDonut extends ChartWidget
{
    protected ?string $heading = 'Car Status Donut';
    protected int | string | array $columnSpan = 1;//"full";
    protected ?string $pollingInterval = '10s';
    protected static ?int $sort = 5;

    protected function getData(): array
        {
            $available = Car::where('availability_status', 'available')->count();
            $booked    = Car::where('availability_status', 'booked')->count();
            $maintenance = Car::where('availability_status', 'maintenance')->count();

            return [
                'datasets' => [
                    [
                        'label' => 'Car Status',
                        'data' => [$available, $booked, $maintenance],
                        'backgroundColor' => [
                            '#a78bfa', // purple
                            '#34d399', // teal-green
                            '#fb7185', // rose
                        ],
                    ],
                ],
                'labels' => ['Available', 'Booked', 'Maintenance'],
            ];
        }

        protected function getType(): string
        {
            return 'doughnut';
    }
}