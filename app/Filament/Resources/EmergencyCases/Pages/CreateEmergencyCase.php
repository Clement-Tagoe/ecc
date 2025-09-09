<?php

namespace App\Filament\Resources\EmergencyCases\Pages;

use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\EmergencyCases\EmergencyCaseResource;

class CreateEmergencyCase extends CreateRecord
{
    protected static string $resource = EmergencyCaseResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
