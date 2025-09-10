<?php

namespace App\Filament\Resources\CameraAudits\Pages;

use App\Filament\Resources\CameraAudits\CameraAuditResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCameraAudit extends ViewRecord
{
    protected static string $resource = CameraAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
