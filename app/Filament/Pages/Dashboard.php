<?php

namespace App\Filament\Pages;

use Carbon\Carbon;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate')
                            ->default(Carbon::now()->startOfMonth()),
                        DatePicker::make('endDate')
                            ->default(Carbon::now()->endOfMonth()),
                    ])
                    ->columns(2)->columnSpanFull(),
            ]);
    }
}