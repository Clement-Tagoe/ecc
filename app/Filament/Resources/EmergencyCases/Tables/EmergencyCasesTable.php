<?php

namespace App\Filament\Resources\EmergencyCases\Tables;

use Carbon\Carbon;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Exports\EmergencyCaseExporter;

class EmergencyCasesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('reporting_time')
                    ->label('Reporting Time')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('h:i a'))
                    ->sortable(),
                TextColumn::make('reporting_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('agency.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('region.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('contact')
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(15),
                TextColumn::make('created_by')
                    ->label('On Duty')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                    Filter::make('created_at')
                    ->schema([
                        DatePicker::make('created_from')
                            ->default(Carbon::today()->subDays(1)),
                        DatePicker::make('created_until')
                            ->default(Carbon::today()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators[] = Indicator::make('Created from ' . Carbon::parse($data['created_from'])->toFormattedDateString());
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators[] = Indicator::make('Created until ' . Carbon::parse($data['created_until'])->toFormattedDateString());
                        }

                        return $indicators;
                    })->columnSpan(2)->columns(2),
                    SelectFilter::make('agency')
                        ->relationship('agency', 'name'),
                    SelectFilter::make('region')
                    ->relationship('region', 'name'),
                    TrashedFilter::make(),
                ], layout: FiltersLayout::AboveContent)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(EmergencyCaseExporter::class),
                    DeleteBulkAction::make(),
                ])->visible(fn () => Auth::user()->hasRole(['Administrator', 'Director', 'Senior Supervisor'])),
            ]);
    }
}
