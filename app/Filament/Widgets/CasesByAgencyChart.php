<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\EmergencyCase;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class CasesByAgencyChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected ?string $heading = 'Cases By Agency Chart';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;
        
        // Fetch case counts grouped by agency
        $caseCounts = EmergencyCase::query()
            ->select('agency_id', DB::raw('count(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('agency_id')
            ->with('agency') // Assuming 'agency' is the relationship name
            ->get();

        // Prepare labels and data for the pie chart
        $labels = [];
        $data = [];
        $backgroundColors = [
            'rgb(59, 130, 246)', // Blue-500 (info)
            'rgb(239, 68, 68)', // Red-500 (danger)
            'rgb(34, 197, 94)', // Green-500 (success)
            'rgb(249, 115, 22)', // Orange-500 (warning)
            'rgb(245, 158, 11)', // Amber-500 (primary)
            'rgb(107, 114, 128)', // Gray-500
        ];

        foreach ($caseCounts as $index => $case) {
            $agencyName = $case->agency ? $case->agency->name : 'Unknown Agency';
            $labels[] = $agencyName;
            $data[] = $case->total;
        }

        // Handle empty data case
        if (empty($data)) {
            $labels = ['No Data'];
            $data = [1]; // Display a single slice for empty state
            $backgroundColors = ['rgb(200, 200, 200)']; // Gray for empty state
        }

        return [
            'datasets' => [
                [
                    'label' => 'Cases by Agency',
                    'data' => $data,
                    'backgroundColor' => array_slice($backgroundColors, 0, count($data)),
                    'hoverOffset' => 20, // Slight animation effect on hover
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
        ];
    }
}
