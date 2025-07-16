<?php

namespace App\Filament\Resources\SdgsResource\Pages;

use App\Filament\Resources\SdgsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdgs extends EditRecord
{
    protected static string $resource = SdgsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
