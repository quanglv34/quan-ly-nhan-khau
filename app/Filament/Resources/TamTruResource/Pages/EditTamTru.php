<?php

namespace App\Filament\Resources\TamTruResource\Pages;

use App\Filament\Resources\TamTruResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTamTru extends EditRecord
{
    protected static string $resource = TamTruResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
