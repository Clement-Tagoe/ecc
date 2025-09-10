<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TimePicker;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date')
                    ->required()
                    ->default(now()),
                Select::make('shift')
                        ->options([
                            'Day' => 'Day',
                            'Night' => 'Night',
                        ])->required(),
                TimePicker::make('time')
                    ->required()
                    ->helperText('Time event occured')
                    ->format('H:i'),
                MarkdownEditor::make('observation')
                    ->required()
                    ->columnSpanFull(),
                Select::make('region_id')
                    ->relationship('region', 'name')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('camera name(s)')
                    ->required(),
                TextInput::make('topic')
                    ->required(),
                MarkdownEditor::make('recommendation')
                    ->required()
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
