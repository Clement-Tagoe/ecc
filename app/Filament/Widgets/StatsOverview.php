<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\CallLog;
use App\Models\EmergencyCase;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        
        $totalCallLogsToday = CallLog::whereDate('created_at', Carbon::today())->count();

        $totalEmergencyCasesToday = EmergencyCase::whereDate('created_at', Carbon::today())->count();

        $totalPoliceCasesToday = EmergencyCase::where('agency_id', 1)
                                    ->whereDate('created_at', Carbon::today())
                                    ->count();

        $totalFireCasesToday = EmergencyCase::where('agency_id', 2)
                                    ->whereDate('created_at', Carbon::today())
                                    ->count();

        $totalAmbulanceCasesToday = EmergencyCase::where('agency_id', 3)
                                    ->whereDate('created_at', Carbon::today())
                                    ->count();
        
        $totalNadmoCasesToday = EmergencyCase::where('agency_id', 4)
                                    ->whereDate('created_at', Carbon::today())
                                    ->count();
        
        
        return [
            Stat::make('Calls Today', $totalCallLogsToday)
                ->description('Total calls recorded today')
                ->color('success')
                ->icon('heroicon-o-phone-arrow-down-left')
                ->chart([18, 13, 5, 20, 6, 7, 8, 10]),

            Stat::make('Emergency Cases Today', $totalEmergencyCasesToday)
                ->description('Total cases recorded today')
                ->color('gray')
                ->icon('heroicon-o-archive-box')
                ->chart([11, 13, 5, 15, 6, 7, 8, 14]),

            Stat::make('Police Cases Today', $totalPoliceCasesToday)
                ->description('Police cases recorded today')
                ->color('info')
                ->icon('heroicon-o-user-circle')
                ->chart([4, 11, 5, 10, 6, 4, 8, 11]),

            Stat::make('Fire Cases Today', $totalFireCasesToday)
                ->description('Fire cases recorded today')
                ->color('danger')
                ->icon('heroicon-o-fire')
                ->chart([8, 5, 9, 10, 6, 7, 8, 4]),

            Stat::make('Ambulance Cases Today', $totalAmbulanceCasesToday)
                ->description('Ambulance cases recorded today')
                ->color('warning')
                ->icon('heroicon-o-truck')
                ->chart([11, 13, 5, 15, 6, 7, 8, 14]),

            Stat::make('NADMO Cases Today', $totalNadmoCasesToday)
                ->description('NADMO cases recorded today')
                ->color('primary')
                ->icon('heroicon-o-home-modern')
                ->chart([8, 15, 5, 10, 6, 8, 4, 9]),
        ];
    }
}
