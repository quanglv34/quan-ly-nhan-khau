<?php

namespace App\Filament\Resources\ThanhVienHoKhauResource\Pages;

use App\Filament\Resources\ThanhVienHoKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThanhVienHoKhaus extends ListRecords
{
    protected static string $resource = ThanhVienHoKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
