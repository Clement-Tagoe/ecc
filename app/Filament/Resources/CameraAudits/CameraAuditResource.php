<?php

namespace App\Filament\Resources\CameraAudits;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use App\Models\CameraAudit;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CameraAudits\Pages\EditCameraAudit;
use App\Filament\Resources\CameraAudits\Pages\ViewCameraAudit;
use App\Filament\Resources\CameraAudits\Pages\ListCameraAudits;
use App\Filament\Resources\CameraAudits\Pages\CreateCameraAudit;
use App\Filament\Resources\CameraAudits\Schemas\CameraAuditForm;
use App\Filament\Resources\CameraAudits\Tables\CameraAuditsTable;

class CameraAuditResource extends Resource
{
    protected static ?string $model = CameraAudit::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-camera';

    protected static string | UnitEnum | null $navigationGroup = 'Surveillance';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return CameraAuditForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CameraAuditsTable::configure($table);
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
            'index' => ListCameraAudits::route('/'),
            'create' => CreateCameraAudit::route('/create'),
            'view' => ViewCameraAudit::route('/{record}'),
            'edit' => EditCameraAudit::route('/{record}/edit'),
        ];
    }
}
