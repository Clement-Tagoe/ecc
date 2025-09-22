<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make()
                    ->schema([
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
                        Select::make('topic')
                            ->options([
                                'Bad Roads' => 'Bad Roads',
                                'Galamsey' => 'Galamsey',
                                'Sanitation' => 'Sanitation',
                                'Prostitution' => 'Prostitution',
                                'Drug Related Activities' => 'Drug Related Activities',
                                'Special Event' => 'Special Event',
                                'Markets' => 'Markets',
                                'ECC Monitoring' => 'ECC Monitoring',
                                'Non-Functioning Traffic Light' => 'Non-Functioning Traffic Light',
                                'Faded Road Sign and Road Marking' => 'Faded Road Sign and Road Marking',
                                'Beggars' => 'Beggars',
                                'Street Hawkers' => 'Street Hawkers',
                                'Unusual Behavior' => 'Unusual Behavior',
                                'Unlawful Car Parking' => 'Unlawful Car Parking',
                                'Flood' => 'Flood',
                                'Traffic' => 'Traffic',
                            ])
                            ->required(),
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
                        MarkdownEditor::make('recommendation')
                            ->required()
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('media')
                            ->label('Images')
                            ->collection('task-images')
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
                    ])->columns(2)->columnSpanFull(),
            ]);
    }
}
