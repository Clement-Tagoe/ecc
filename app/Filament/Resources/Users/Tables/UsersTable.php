<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('role.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                 SelectFilter::make('role')
                    ->relationship('role', 'name'),
                 TrashedFilter::make(),
            ])
            ->recordActions([
                Action::make('Change Password')
                    ->authorize('update')
                    ->icon('heroicon-o-key')
                    ->schema([
                        TextInput::make('password')
                            ->required()
                            ->password()
                            ->same('passwordConfirmation'),
                        TextInput::make('passwordConfirmation')
                            ->required()
                            ->password(),
                    ])
                    ->action(function (User $user, array $data) {
                        $user->update(['password' => Hash::make($data['password'])]);

                        Notification::make()
                            ->success()
                            ->title('Password Changed')
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ])->visible(fn () => Auth::user()->hasRole(['Administrator', 'Director', 'Senior Supervisor'])),
            ]);
    }
}
