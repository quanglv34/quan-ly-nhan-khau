<?php

namespace App\Filament\Resources\HoKhauResource\Pages;

use App\Filament\Resources\HoKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHoKhau extends EditRecord
{
    protected static string $resource = HoKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
