<?php

namespace App\Filament\Resources\CastingSubmissionResource\Pages;

use App\Filament\Resources\CastingSubmissionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCastingSubmission extends EditRecord
{
    protected static string $resource = CastingSubmissionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
