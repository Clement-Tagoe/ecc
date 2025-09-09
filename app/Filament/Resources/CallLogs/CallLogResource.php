<?php

namespace App\Filament\Resources\CallLogs;

use App\Filament\Resources\CallLogs\Pages\CreateCallLog;
use App\Filament\Resources\CallLogs\Pages\EditCallLog;
use App\Filament\Resources\CallLogs\Pages\ListCallLogs;
use App\Filament\Resources\CallLogs\Pages\ViewCallLog;
use App\Filament\Resources\CallLogs\Schemas\CallLogForm;
use App\Filament\Resources\CallLogs\Tables\CallLogsTable;
use App\Models\CallLog;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CallLogResource extends Resource
{
    protected static ?string $model = CallLog::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone-arrow-down-left';

    protected static string | UnitEnum | null $navigationGroup = 'Main Menu';

    protected static ?int $navigationSort = 0;

    public static function form(Schema $schema): Schema
    {
        return CallLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CallLogsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCallLogs::route('/'),
            'create' => CreateCallLog::route('/create'),
            'view' => ViewCallLog::route('/{record}'),
            'edit' => EditCallLog::route('/{record}/edit'),
        ];
    }
}
