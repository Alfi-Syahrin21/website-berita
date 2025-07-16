<?php

namespace App\Filament\Resources\SdgsResource\Pages;

use App\Filament\Resources\SdgsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdgs extends ListRecords
{
    protected static string $resource = SdgsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
