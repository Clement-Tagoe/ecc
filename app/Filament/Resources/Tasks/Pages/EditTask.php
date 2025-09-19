<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Models\TaskImage;
use Illuminate\Support\Arr;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Tasks\TaskResource;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $images = Arr::pull($data, 'images');

    //     if ($images) {
    //         // Delete existing images if needed
    //         $this->record->images()->delete();
            
    //         foreach ($images as $image) {
    //             TaskImage::create([
    //                 'task_id' => $this->record->id,
    //                 'path' => $image,
    //             ]);
    //         }
    //     }

    //     return $data;
    // }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
