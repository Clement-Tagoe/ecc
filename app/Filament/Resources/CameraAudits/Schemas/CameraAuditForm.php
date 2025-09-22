<?php

namespace App\Filament\Resources\CameraAudits\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CameraAuditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date')
                    ->default(now())
                    ->required(),
                TimePicker::make('time')
                    ->format('H:i')
                    ->required(),
                TextInput::make('camera_name')
                    ->required(),
                Select::make('camera_status')
                    ->options([
                        'online' => 'online',
                        'offline' => 'offline',
                    ])
                    ->required(),
                Select::make('observation')
                    ->options([
                        'Blocked_by_trees' => 'Blocked_by_trees',
                        'Blocked_by_billboards' => 'Blocked_by_billboards',
                        'Black_&_white' => 'Black_&_white',
                        'Blur_view' => 'Blur_view',
                        'Black_view' => 'Black_view',
                        'Pink_view' => 'Pink_view',
                        'Repositioning' => 'Repositioning',
                        'PTZ_control_defect' => 'PTZ_control_defect',
                        'Weak_signal' => 'Weak_signal',
                        'Flickering' => 'Flickering',
                    ])
                    ->multiple()
                    ->required(),
                SpatieMediaLibraryFileUpload::make('media')
                    ->label('Images')
                    ->collection('camera-audit-images')
                    ->multiple()
                    ->maxFiles(5)
                    ->reorderable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->columnSpanFull(),
                TextInput::make('created_by')
                    ->label('On Duty')
                    ->default(Auth::user()->name) // Set to current user's name
                    ->disabled() // Make the input non-editable
                    ->dehydrated()
                    ->required(),
            ]);
    }
}
