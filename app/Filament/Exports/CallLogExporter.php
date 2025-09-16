<?php

namespace App\Filament\Exports;

use App\Models\CallLog;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class CallLogExporter extends Exporter
{
    protected static ?string $model = CallLog::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('number'),
            ExportColumn::make('shift'),
            ExportColumn::make('start_time'),
            ExportColumn::make('end_time'),
            ExportColumn::make('user.name'),
            ExportColumn::make('created_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your call log export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
