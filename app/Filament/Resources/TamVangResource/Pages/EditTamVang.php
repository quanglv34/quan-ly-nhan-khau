<?php

namespace App\Filament\Resources\TamVangResource\Pages;

use App\Filament\Resources\TamVangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTamVang extends EditRecord
{
    protected static string $resource = TamVangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
