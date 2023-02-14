<?php

namespace App\Filament\Resources\TamVangResource\Pages;

use App\Filament\Resources\TamVangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTamVang extends ListRecords
{
    protected static string $resource = TamVangResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
