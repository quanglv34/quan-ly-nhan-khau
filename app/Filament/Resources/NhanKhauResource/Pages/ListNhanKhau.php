<?php

namespace App\Filament\Resources\NhanKhauResource\Pages;

use App\Filament\Resources\NhanKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNhanKhau extends ListRecords
{
    protected static string $resource = NhanKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
