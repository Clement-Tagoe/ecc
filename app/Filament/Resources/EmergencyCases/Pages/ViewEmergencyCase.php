<?php

namespace App\Filament\Resources\EmergencyCases\Pages;

use App\Filament\Resources\EmergencyCases\EmergencyCaseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEmergencyCase extends ViewRecord
{
    protected static string $resource = EmergencyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
