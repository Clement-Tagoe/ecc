<?php

namespace App\Filament\Resources\EmergencyCases;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\EmergencyCase;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmergencyCases\Pages\EditEmergencyCase;
use App\Filament\Resources\EmergencyCases\Pages\ViewEmergencyCase;
use App\Filament\Resources\EmergencyCases\Pages\ListEmergencyCases;
use App\Filament\Resources\EmergencyCases\Pages\CreateEmergencyCase;
use App\Filament\Resources\EmergencyCases\Schemas\EmergencyCaseForm;
use App\Filament\Resources\EmergencyCases\Tables\EmergencyCasesTable;

class EmergencyCaseResource extends Resource
{
    protected static ?string $model = EmergencyCase::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrows-pointing-in';

    protected static string | UnitEnum | null $navigationGroup = 'Call Center';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return EmergencyCaseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmergencyCasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
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
            'index' => ListEmergencyCases::route('/'),
            'create' => CreateEmergencyCase::route('/create'),
            'view' => ViewEmergencyCase::route('/{record}'),
            'edit' => EditEmergencyCase::route('/{record}/edit'),
        ];
    }
}
