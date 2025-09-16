<?php

namespace App\Filament\Exports;

use App\Models\EmergencyCase;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class EmergencyCaseExporter extends Exporter
{
    protected static ?string $model = EmergencyCase::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('reporting_time'),
            ExportColumn::make('reporting_date'),
            ExportColumn::make('agency.name'),
            ExportColumn::make('region.name'),
            ExportColumn::make('location'),
            ExportColumn::make('contact'),
            ExportColumn::make('description'),
            ExportColumn::make('action_taken'),
            ExportColumn::make('feedback'),
            ExportColumn::make('user.name'),
            ExportColumn::make('created_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your emergency case export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
