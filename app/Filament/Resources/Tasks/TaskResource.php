<?php

namespace App\Filament\Resources\Tasks;

use UnitEnum;
use BackedEnum;
use App\Models\Task;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\Tasks\Pages\EditTask;
use App\Filament\Resources\Tasks\Pages\ViewTask;
use App\Filament\Resources\Tasks\Pages\ListTasks;
use App\Filament\Resources\Tasks\Pages\CreateTask;
use App\Filament\Resources\Tasks\Schemas\TaskForm;
use App\Filament\Resources\Tasks\Tables\TasksTable;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\Tasks\RelationManagers\TaskImagesRelationManager;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Builder;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string | UnitEnum | null $navigationGroup = 'Surveillance';

    protected static ?int $navigationSort = 0;

    public static function form(Schema $schema): Schema
    {
        return TaskForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TasksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
         
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTasks::route('/'),
            'create' => CreateTask::route('/create'),
            'view' => ViewTask::route('/{record}'),
            'edit' => EditTask::route('/{record}/edit'),
        ];
    }
}
