<?php

namespace App\Filament\Resources\EmergencyCases\Pages;

use App\Filament\Resources\EmergencyCases\EmergencyCaseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEmergencyCase extends EditRecord
{
    protected static string $resource = EmergencyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
