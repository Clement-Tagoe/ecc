<?php

namespace App\Filament\Resources\CameraAudits\Pages;

use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CameraAudits\CameraAuditResource;

class CreateCameraAudit extends CreateRecord
{
    protected static string $resource = CameraAuditResource::class;

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
