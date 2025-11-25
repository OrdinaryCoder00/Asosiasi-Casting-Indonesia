<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Str;


class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'News';
    protected static ?string $pluralLabel = 'News';
    protected static ?string $navigationGroup = 'ACI Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Judul News')
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                Textarea::make('excerpt')
                    ->label('Excerpt / Ringkasan')
                    ->rows(3),

                

                RichEditor::make('content')
                    ->label('Isi News')
                    ->required()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'blockquote', 'link', 'image',
                        'orderedList', 'bulletList', 'codeBlock',
                        'h1', 'h2', 'h3',
                    ])
                    ->afterStateUpdated(function ($state, $set) {
                        // Izinkan tag penting
                        $allowedTags = '<p><br><h1><h2><h3><b><strong><i><em><u><ul><ol><li>';

                        // Hapus tag yang tidak diinginkan
                        $cleanContent = strip_tags($state, $allowedTags);

                        // Ganti &nbsp; jadi spasi biasa
                        $cleanContent = str_replace('&nbsp;', ' ', $cleanContent);

                        // Normalisasi line breaks
                        $cleanContent = preg_replace("/(\r\n|\r|\n)+/", "\n", $cleanContent);

                        // Bersihkan spasi berlebih
                        $cleanContent = preg_replace('/[ \t]{2,}/', ' ', $cleanContent);

                        // Tambahkan <br> di akhir paragraf jika tidak ada
                        $cleanContent = preg_replace('/<p>(.*?)<\/p>/i', '<p>$1</p>', $cleanContent);

                        $set('content', trim($cleanContent));
                    })
                    ->maxLength(10000),


                TextInput::make('author')
                    ->label('Penulis')
                    ->default('Admin'),

                FileUpload::make('image')
                    ->label('Gambar News')
                    ->image()
                    ->directory('news/images')
                    ->maxSize(2048),

                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->default(now()),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'regular' => 'Regular',
                        'announcement' => 'Announcement',
                        'highlight' => 'Highlight',
                    ])
                    ->default('regular')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul')->searchable()->sortable(),
                TextColumn::make('author')->label('Penulis')->searchable(),
                TextColumn::make('slug')->label('Slug')->sortable(),
                TextColumn::make('category')->label('Kategori')->sortable(),
                TextColumn::make('published_at')->label('Publish')->date('d M Y')->sortable(),
                TextColumn::make('created_at')->label('Dibuat')->date('d M Y'),
            ])
            ->defaultSort('published_at', 'desc')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}