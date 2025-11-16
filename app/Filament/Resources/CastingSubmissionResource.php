<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CastingSubmissionResource\Pages;
use App\Models\CastingSubmission;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;


class CastingSubmissionResource extends Resource
{
    protected static ?string $model = CastingSubmission::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $pluralModelLabel = 'Casting Submissions';
    protected static ?int $navigationSort = 1;

    public static function canCreate(?object $record = null): bool { return false; }
    public static function canEdit(?object $record = null): bool { return false; }
    public static function canDelete(?object $record = null): bool { return true; }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullname')->sortable()->searchable(),
                TextColumn::make('email')->sortable(),
                TextColumn::make('category'),
                TextColumn::make('created_at')->dateTime(),
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->getStateUsing(fn($record) => $record->photo ? \Illuminate\Support\Facades\Storage::url($record->photo) : null)
                    ->rounded(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCastingSubmissions::route('/'),
            'view'  => Pages\ViewCastingSubmission::route('/{record}'),
        ];
    }
}