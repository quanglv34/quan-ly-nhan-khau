<?php

namespace App\Filament\Resources\DanhMucQuyResource\Pages;

use App\Actions\DanhMucQuy\TaoDanhMucQuy;
use App\Filament\Resources\DanhMucQuyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDanhMucQuy extends ListRecords
{
    protected static string $resource = DanhMucQuyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->using(function ($data) {
                (new TaoDanhMucQuy($data))->handle();
    }),
        ];
    }
}
