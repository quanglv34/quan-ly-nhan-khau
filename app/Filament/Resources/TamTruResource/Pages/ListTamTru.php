<?php

namespace App\Filament\Resources\TamTruResource\Pages;

use App\Filament\Resources\TamTruResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTamTru extends ListRecords
{
    protected static string $resource = TamTruResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
