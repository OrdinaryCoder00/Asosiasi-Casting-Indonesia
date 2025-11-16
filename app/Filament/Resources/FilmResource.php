<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Models\Film;
use App\Models\BoardOfOfficer;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationLabel = 'Films';
    protected static ?string $pluralLabel = 'Films';
    protected static ?string $navigationGroup = 'ACI Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Nama Film'),

                TextInput::make('year')
                    ->numeric()
                    ->required()
                    ->label('Tahun Pembuatan'),

                Textarea::make('description')
                    ->label('Deskripsi Film')
                    ->rows(3),

                FileUpload::make('poster')
                    ->label('Poster Film')
                    ->image()
                    ->directory('films/posters')
                    ->maxSize(2048)
                    ->columnSpan('full'),

                Select::make('casting_director_id')
                    ->label('Casting Director')
                    ->options(BoardOfOfficer::all()->pluck('name','id'))
                    ->searchable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('poster')
                    ->label('Poster')
                    ->square(),
                TextColumn::make('title')
                    ->label('Nama Film')
                    ->searchable(),
                TextColumn::make('year')
                    ->label('Tahun'),
                TextColumn::make('castingDirector.name')
                    ->label('Casting Director')
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->label('Deskripsi'),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->label('Created'),
            ])
            ->defaultSort('year', 'desc')
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
