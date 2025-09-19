<?php

namespace App\Filament\Resources\Tasks\RelationManagers;

use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;

class TaskImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
               FileUpload::make('path')
                            ->multiple()
                            ->directory('task-images')
                            ->preserveFilenames()
                            ->image()
                            ->maxFiles(5)
                            ->columnSpanFull()
                            ->imageEditor(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('path')
            ->columns([
                ImageColumn::make('path')
                    ->label('Image')
                    ->getStateUsing(fn ($record) => $record->path),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                // DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
