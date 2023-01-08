<?php

namespace App\Filament\Resources\ChungMinhThuResource\Pages;

use App\Filament\Resources\ChungMinhThuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ManageRecords;

class ListChungMinhThu extends ListRecords
{
    protected static string $resource = ChungMinhThuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
