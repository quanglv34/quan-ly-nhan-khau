<?php

namespace App\Filament\Resources\DanhMucQuyResource\Pages;

use App\Filament\Resources\DanhMucQuyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDanhMucQuy extends EditRecord
{
    protected static string $resource = DanhMucQuyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
