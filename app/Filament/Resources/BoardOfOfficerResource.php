<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardOfOfficerResource\Pages;
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

class BoardOfOfficerResource extends Resource
{
    protected static ?string $model = BoardOfOfficer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Board of Officers';
    protected static ?string $pluralLabel = 'Board of Officers';
    protected static ?string $navigationGroup = 'ACI Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('photo')
                    ->label('Photo Officer')
                    ->image()
                    ->directory('board/photos')
                    ->maxSize(2048)
                    ->columnSpan('full'),

                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Carousel Order')
                    ->helperText('Nomor urut di carousel'),

                TextInput::make('name')
                    ->required()
                    ->label('Nama Officer'),

                Textarea::make('intro')
                    ->rows(3)
                    ->label('Pengenalan Singkat'),

                Select::make('films')
                    ->label('Films')
                    ->multiple()
                    ->relationship('films', 'title'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->square(),

                TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('intro')
                    ->limit(50)
                    ->label('Pengenalan'),

                TextColumn::make('films_count')
                    ->label('Jumlah Film')
                    ->counts('films'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->label('Created'),
            ])
            ->defaultSort('order', 'asc')
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
            'index' => Pages\ListBoardOfOfficers::route('/'),
            'create' => Pages\CreateBoardOfOfficer::route('/create'),
            'edit' => Pages\EditBoardOfOfficer::route('/{record}/edit'),
        ];
    }
}