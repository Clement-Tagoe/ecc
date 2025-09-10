<?php

namespace App\Filament\Resources\CameraAudits\Pages;

use App\Filament\Resources\CameraAudits\CameraAuditResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCameraAudits extends ListRecords
{
    protected static string $resource = CameraAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
