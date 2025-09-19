<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Models\TaskImage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Tasks\TaskResource;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }

    // protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    // {
    //     $record = static::getModel()::create(Arr::except($data, ['images']));

    //     if (isset($data['images'])) {
    //         foreach ($data['images'] as $image) {
    //             TaskImage::create([
    //                 'task_id' => $record->id,
    //                 'path' => $image,
    //             ]);
    //         }
    //     }

    //     return $record;
    // }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
