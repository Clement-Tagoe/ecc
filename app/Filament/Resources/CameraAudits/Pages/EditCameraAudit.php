<?php

namespace App\Filament\Resources\CameraAudits\Pages;

use App\Filament\Resources\CameraAudits\CameraAuditResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCameraAudit extends EditRecord
{
    protected static string $resource = CameraAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
