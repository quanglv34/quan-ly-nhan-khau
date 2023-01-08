<?php

namespace App\Filament\Resources\HoKhauResource\Pages;

use App\Filament\Resources\HoKhauResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHoKhaus extends ListRecords
{
    protected static string $resource = HoKhauResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
