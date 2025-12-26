<?php

namespace App\Filament\Widgets;

use App\Models\UserProfile;
use Filament\Widgets\ChartWidget;

class UsersByRoleOverview extends ChartWidget
{
    protected ?string $heading = 'Users By Role Overview';
    public static ?int $sort = 3;

    protected function getData(): array
    {
        $roles = ['admin', 'owner', 'customer'];
        $data = [];

        foreach ($roles as $role) {
            $data[$role] = UserProfile::where('role', $role)->count();
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#ef4444', // admin - red
                        '#3b82f6', // owner - blue
                        '#10b981', // customer - green
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
