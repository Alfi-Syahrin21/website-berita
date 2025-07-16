<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FIlament\Forms\Components\Textarea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(3)->schema([
                    // Kolom utama untuk konten
                    Section::make()->columnSpan(2)->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\Textarea::make('quote')
                            ->label('Kutipan Pembuka (Opsional)')
                            ->rows(3),
                        RichEditor::make('content')
                            ->required()
                            ->fileAttachmentsDirectory('news/content-attachments')
                            ->fileAttachmentsDisk('public') 
                            ->columnSpanFull(),
                    ]),

                    // Kolom samping untuk metadata
                    Section::make()->columnSpan(1)->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->directory('news/thumbnails')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())->prepend(date('Y/m/') . Str::random(10) . '-')
                            ),
                        TextInput::make('thumbnail_caption')
                            ->label('Caption Thumbnail'),
                        DateTimePicker::make('published_at')->default(now()),
                        TextInput::make('publisher_name')
                            ->required()
                            ->label('Nama Penulis'),
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->label('Admin Input')
                            ->default(auth()->id()),
                        Select::make('sdgs_id')
                            ->relationship('sdgs', 'name')
                            ->multiple()
                            ->preload()
                            ->label('Kategori SDGs'),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->label(''),
                TextColumn::make('title')->searchable()->sortable()->limit(50),
                TextColumn::make('publisher_name')->searchable()->label('Penulis'),
                TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\PhotosRelationManager::class,
        ];
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