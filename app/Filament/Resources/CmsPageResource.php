<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CmsPageResource\Pages;
use App\Models\CmsPage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Concerns\Translatable;

class CmsPageResource extends Resource
{
    use Translatable;
    protected static ?string $model = CmsPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('content')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('İmage Upload')
                    ->required()
                    ->disk('public')
                    ->directory('web')
                    ->preserveFilenames()
                    ->enableOpen()
                    ->enableDownload()
                    ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpeg'])
                    ->maxSize(4048)
                    ->columnSpanFull()
                    ->optimize('webp'),
                Forms\Components\Textarea::make('meta_title')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('meta_description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('meta_keywords')
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tags')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCmsPages::route('/'),
            'create' => Pages\CreateCmsPage::route('/create'),
            'edit' => Pages\EditCmsPage::route('/{record}/edit'),
        ];
    }
}
