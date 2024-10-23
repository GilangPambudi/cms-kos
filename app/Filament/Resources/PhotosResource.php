<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Photos;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\PhotosResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PhotosResource\RelationManagers;

class PhotosResource extends Resource
{
    protected static ?string $model = Photos::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->after(
                    function (Photos $record){
                        if ($record->thumbnail){
                            Storage::disk('public')->delete($record->thumbnail);
                        }
                    }
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->after(function (Collection $records) {
                        foreach ($records as $key => $value) {
                            if ($value->thumbnail) {
                                Storage::disk('public')->delete($value->thumbnail);
                            }
                        }
                    }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePhotos::route('/'),
        ];
    }
}
