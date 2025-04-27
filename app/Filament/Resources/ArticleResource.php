<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;

use Illuminate\Support\Str;

use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;


class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Hidden::make('user_id')
                ->default(fn() => auth()->id()),

            TextInput::make('title')
                ->label('Judul Artikel')
                ->required()
                ->reactive()
                ->live(onBlur: true)
                ->afterStateUpdated(
                    fn($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            TextInput::make('slug')
                ->label('Slug/URL')
                ->required()
                ->unique('articles', 'slug', ignoreRecord: true)
                ->disabled(), // Non-editable agar otomatis dari title

            TinyEditor::make('content')
                ->label('Isi Artikel')
                ->columnSpanFull()
                ->minHeight(500)
                ->fileAttachmentsDisk('public') // Simpan di storage/public
                ->fileAttachmentsDirectory('images') // Folder dalam storage/public/images
                ->fileAttachmentsVisibility('public') // Pastikan file bisa diakses publik
                ->required(),

            Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->required(),

            Select::make('user_id')
                ->label('Penulis')
                ->relationship('user', 'name')
                ->default(auth()->id())
                ->disabled(),

            FileUpload::make('image')
                ->label('Gambar Thumbnail')
                ->image()
                ->maxSize(4096) // Maksimum 4MB
                ->imageCropAspectRatio('16:9') // Rasio 16:9
                ->imageResizeTargetWidth(800)
                ->imageResizeTargetHeight(400)
                ->rules(['mimes:jpg,jpeg,png'])
                ->directory('articles/thumbnails')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('title')->label('Judul'),
            TextColumn::make('category.name')->label('Kategori'),
            TextColumn::make('user.name')->label('Penulis'),
            TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}

class CreateArticle extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke daftar artikel
    }
}

class EditArticle extends EditRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirect ke daftar artikel
    }
}