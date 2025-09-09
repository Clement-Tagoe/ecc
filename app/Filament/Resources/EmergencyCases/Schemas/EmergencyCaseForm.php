<?php

namespace App\Filament\Resources\EmergencyCases\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\MarkdownEditor;

class EmergencyCaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TimePicker::make('reporting_time')
                    ->required()
                    ->label('Reporting Time')
                    ->format('H:i'),
                DatePicker::make('reporting_date')
                    ->required()
                    ->label('Reporting Date')
                    ->default(now()),
                Select::make('agency_id')
                    ->label('Responding Agency')
                    ->relationship('agency', 'name')
                    ->required(),
                Select::make('region_id')
                    ->relationship('region', 'name')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('contact')
                    ->minLength(10)
                    ->required(),
                MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('action_taken')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('feedback')
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
