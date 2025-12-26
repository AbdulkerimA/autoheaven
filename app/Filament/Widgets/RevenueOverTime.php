<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;

class RevenueOverTime extends ChartWidget
{
    protected ?string $heading = 'Revenue Over Time';
    // protected static ?int $sort = 7;
    // protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        $revenueData = Transaction::where('status', 'completed')
            ->selectRaw('SUM(amount) as total, strftime("%Y-%m", created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return [
            'labels' => array_keys($revenueData),
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => array_values($revenueData),
                    'borderColor' => '#10b981', // green line
                    'backgroundColor' => 'rgba(16,185,129,0.2)', // light green fill
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
