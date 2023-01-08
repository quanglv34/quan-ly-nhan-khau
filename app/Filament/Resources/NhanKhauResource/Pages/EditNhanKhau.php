<?php

namespace App\Filament\Resources\NhanKhauResource\Pages;

use App\Filament\Resources\NhanKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNhanKhau extends EditRecord
{
    protected static string $resource = NhanKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
