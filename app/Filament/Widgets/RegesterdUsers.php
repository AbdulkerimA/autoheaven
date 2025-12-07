<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class RegesterdUsers extends ChartWidget
{
    protected ?string $heading = 'Regesterd Users';
    protected ?string $pollingInterval = '10s';
    protected int | string | array $columnSpan = 2;
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Initialize 12 months with 0
        $monthlyTotals = array_fill(1, 12, 0);

        // Get counts grouped by month (SQLite syntax)
        $users = User::selectRaw("CAST(strftime('%m', created_at) AS INTEGER) as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Fill monthlyTotals with actual data
        foreach ($users as $user) {
            $monthlyTotals[$user->month] = $user->total;
        }

        // Convert to zero-indexed array for Filament chart
        $data = array_values($monthlyTotals);
        // dd($data);

        return [
            'datasets' => [
                [
                    'name' => 'Users',
                    'data' => $data,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
