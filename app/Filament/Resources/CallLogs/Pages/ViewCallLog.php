<?php

namespace App\Filament\Resources\CallLogs\Pages;

use App\Filament\Resources\CallLogs\CallLogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCallLog extends ViewRecord
{
    protected static string $resource = CallLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
