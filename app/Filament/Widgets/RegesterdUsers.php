<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RegesterdUsers extends ChartWidget
{
    protected ?string $heading = 'Regesterd Users';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bubble';
    }
}
