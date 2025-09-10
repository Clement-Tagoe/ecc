<?php

namespace App\Filament\Resources\CameraAudits\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;

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
                TextInput::make('observation')
                    ->required(),
                TextInput::make('created_by')
                    ->label('On Duty')
                    ->default(Auth::user()->name) // Set to current user's name
                    ->disabled() // Make the input non-editable
                    ->dehydrated()
                    ->required(),
            ]);
    }
}
