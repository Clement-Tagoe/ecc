<?php

namespace App\Filament\Resources\CallLogs\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TimePicker;

class CallLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make()
                    ->schema([
                    TextInput::make('number')
                        ->label('Total Calls')
                        ->required()
                        ->numeric(),
                    Select::make('shift')
                        ->options([
                            'Day' => 'Day',
                            'Night' => 'Night',
                        ])->required(),
                    TimePicker::make('start_time')
                        ->label('Start Time')
                        ->format('H:i')
                        ->required(),
                    TimePicker::make('end_time')
                        ->label('End Time')
                        ->format('H:i')
                        ->required(),
                    TextInput::make('created_by')
                        ->label('On Duty')
                        ->default(Auth::user()->name) // Set to current user's name
                        ->disabled() // Make the input non-editable
                        ->dehydrated()
                        ->required(),
                ])->columns(2)->columnSpan(2),
            ]);
    }
}
