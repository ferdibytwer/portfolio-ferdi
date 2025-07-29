<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Tables;
use App\Models\Sertif;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\SertifResource\Pages;

class SertifResource extends Resource
{
    protected static ?string $model = Sertif::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $slug = Str::slug($state);
                            $set('slug', $slug);
                        }
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->dehydrated()
                    ->readOnly(true),
                Forms\Components\FileUpload::make('image')
                    ->acceptedFileTypes(['image/*', 'application/pdf']),
                Forms\Components\TextInput::make('lembaga')
                    ->nullable(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->nullable(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('lembaga')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSertifs::route('/'),
            'create' => Pages\CreateSertif::route('/create'),
            'edit' => Pages\EditSertif::route('/{record}/edit'),
        ];
    }
}
