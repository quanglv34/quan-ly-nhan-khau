<?php

namespace App\Filament\Resources\ThanhVienHoKhauResource\Pages;

use App\Filament\Resources\ThanhVienHoKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThanhVienHoKhau extends EditRecord
{
    protected static string $resource = ThanhVienHoKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
