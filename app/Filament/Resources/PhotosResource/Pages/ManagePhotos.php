<?php

namespace App\Filament\Resources\PhotosResource\Pages;

use App\Filament\Resources\PhotosResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePhotos extends ManageRecords
{
    protected static string $resource = PhotosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
