<?php

namespace App\Filament\Resources\FacilitiesResource\Pages;

use Filament\Actions;
use App\Models\Facilities;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\FacilitiesResource;

class EditFacilities extends EditRecord
{
    protected static string $resource = FacilitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function (Facilities $record){
                    if ($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
