<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->unique(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->required()
                    ->password(),
                Select::make('role_id')
                    ->relationship('role', 'name')
                    ->required(),
            ]);
    }
}
