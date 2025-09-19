<?php

namespace App\Filament\Resources\Tasks\Tables;

use Carbon\Carbon;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use App\Filament\Exports\TaskExporter;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $userId = Auth::id();
                $user = User::findOrFail($userId);
                if (!$user->hasRole(['Administrator', 'Director', 'Senior Supervisor'])) {
                    $query->where('user_id', $user->id);
                }
            })
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                 TextColumn::make('shift')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('time')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('h:i a'))
                    ->sortable(),
                TextColumn::make('topic')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('observation')
                    ->limit(15),
                TextColumn::make('region.name')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('camera name(s)'),
                TextColumn::make('created_by')
                    ->label('On Duty')
                    ->searchable(),
            //    ImageColumn::make('images.path')
            //         ->stacked()
            //         ->limit(3)
            //         ->limitedRemainingText(),
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
                                ->default(Carbon::today()->subDays(2)),
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
                        SelectFilter::make('region')
                        ->relationship('region', 'name'),
                        
                ], layout: FiltersLayout::AboveContent)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(TaskExporter::class),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
