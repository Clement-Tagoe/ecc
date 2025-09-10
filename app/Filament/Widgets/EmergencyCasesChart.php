<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Flowframe\Trend\Trend;
use App\Models\EmergencyCase;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class EmergencyCasesChart extends ChartWidget
{
    protected ?string $heading = 'Emergency Cases Chart';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = Trend::model(EmergencyCase::class)
        ->between(
            start: Carbon::now()->startOfMonth(),
            end: Carbon::now()->endOfMonth(),
        )
        ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Emergency Cases per Day',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#4b0c64ff', 
                    'backgroundColor' => 'rgba(60, 8, 90, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('M d')),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
