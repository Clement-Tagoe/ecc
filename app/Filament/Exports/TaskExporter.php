<?php

namespace App\Filament\Exports;

use App\Models\Task;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class TaskExporter extends Exporter
{
    protected static ?string $model = Task::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('date'),
            ExportColumn::make('time'),
            ExportColumn::make('shift'),
            ExportColumn::make('observation'),
            ExportColumn::make('region.name'),
            ExportColumn::make('user.name'),
            ExportColumn::make('location'),
            ExportColumn::make('camera name(s)'),
            ExportColumn::make('topic'),
            ExportColumn::make('recommendation'),
            ExportColumn::make('created_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your task export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
