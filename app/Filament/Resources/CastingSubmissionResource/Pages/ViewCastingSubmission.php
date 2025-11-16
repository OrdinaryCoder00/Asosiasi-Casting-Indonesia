<?php

namespace App\Filament\Resources\CastingSubmissionResource\Pages;

use App\Filament\Resources\CastingSubmissionResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Grid;

class ViewCastingSubmission extends ViewRecord
{
    protected static string $resource = CastingSubmissionResource::class;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('fullname')->disabled(),
            TextInput::make('email')->disabled(),
            TextInput::make('city')->disabled(),
            TextInput::make('portfolio')->disabled(),
            Textarea::make('projects')->disabled(),
            TextInput::make('skills')->disabled(),
            TextInput::make('languages')->disabled(),
            TextInput::make('category')->disabled(),

        Grid::make(2)->schema([
            ViewField::make('photo_preview')
                ->label('Photo')
                ->view('filament.casting-submission-photo', ['record' => $this->record]),

            ViewField::make('video_preview')
                ->label('Video')
                ->view('filament.casting-submission-video', ['record' => $this->record]),
        ]),


            Toggle::make('confirmed_info')->label('Confirmed Info')->disabled(),
            Toggle::make('confirmed_permission')->label('Confirmed Permission')->disabled(),
        ];
    }
}