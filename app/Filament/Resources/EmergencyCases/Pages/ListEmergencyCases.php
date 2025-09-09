<?php

namespace App\Filament\Resources\EmergencyCases\Pages;

use App\Filament\Resources\EmergencyCases\EmergencyCaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmergencyCases extends ListRecords
{
    protected static string $resource = EmergencyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
