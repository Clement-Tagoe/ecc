<?php

namespace App\Filament\Widgets;

use App\Models\CallLog;
use App\Models\EmergencyCase;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;
    
    protected function getStats(): array
    {
        $startDate = $this->pageFilters['startDate'] ?? null;
        $endDate = $this->pageFilters['endDate'] ?? null;

        $totalCallLogsToday = CallLog::whereBetween('created_at', [$startDate, $endDate])->count();

        $totalEmergencyCasesToday = EmergencyCase::whereBetween('created_at', [$startDate, $endDate])->count();

        $totalPoliceCasesToday = EmergencyCase::where('agency_id', 1)
                                    ->whereBetween('created_at', [$startDate, $endDate])
                                    ->count();

        $totalFireCasesToday = EmergencyCase::where('agency_id', 2)
                                    ->whereBetween('created_at', [$startDate, $endDate])
                                    ->count();

        $totalAmbulanceCasesToday = EmergencyCase::where('agency_id', 3)
                                    ->whereBetween('created_at', [$startDate, $endDate])
                                    ->count();
        
        $totalNadmoCasesToday = EmergencyCase::where('agency_id', 4)
                                    ->whereBetween('created_at', [$startDate, $endDate])
                                    ->count();
        
        
        return [
            Stat::make('Calls', $totalCallLogsToday)
                ->description('Total calls recorded')
                ->color('success')
                ->icon('heroicon-o-phone-arrow-down-left')
                ->chart([18, 13, 5, 20, 6, 7, 8, 10]),

            Stat::make('Emergency Cases', $totalEmergencyCasesToday)
                ->description('Total cases recorded')
                ->color('gray')
                ->icon('heroicon-o-archive-box')
                ->chart([11, 13, 5, 15, 6, 7, 8, 14]),

            Stat::make('Police Cases', $totalPoliceCasesToday)
                ->description('Police cases recorded')
                ->color('info')
                ->icon('heroicon-o-user-circle')
                ->chart([4, 11, 5, 10, 6, 4, 8, 11]),

            Stat::make('Fire Cases', $totalFireCasesToday)
                ->description('Fire cases recorded')
                ->color('danger')
                ->icon('heroicon-o-fire')
                ->chart([8, 5, 9, 10, 6, 7, 8, 4]),

            Stat::make('Ambulance Cases', $totalAmbulanceCasesToday)
                ->description('Ambulance cases recorded')
                ->color('warning')
                ->icon('heroicon-o-truck')
                ->chart([11, 13, 5, 15, 6, 7, 8, 14]),

            Stat::make('NADMO Cases', $totalNadmoCasesToday)
                ->description('NADMO cases recorded')
                ->color('primary')
                ->icon('heroicon-o-home-modern')
                ->chart([8, 15, 5, 10, 6, 8, 4, 9]),
        ];
    }
}
