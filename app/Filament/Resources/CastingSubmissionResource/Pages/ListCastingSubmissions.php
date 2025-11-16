<?php

namespace App\Filament\Resources\CastingSubmissionResource\Pages;

use App\Filament\Resources\CastingSubmissionResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListCastingSubmissions extends ListRecords
{
    protected static string $resource = CastingSubmissionResource::class;

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('fullname')->label('Full Name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email')->sortable(),
            Tables\Columns\TextColumn::make('category'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }
}
