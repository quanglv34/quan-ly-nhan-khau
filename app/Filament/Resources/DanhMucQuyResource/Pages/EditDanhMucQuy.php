<?php

namespace App\Filament\Resources\DanhMucQuyResource\Pages;

use App\Filament\Resources\DanhMucQuyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EditDanhMucQuy extends EditRecord
{
    protected static string $resource = DanhMucQuyResource::class;


    protected function getHeaderWidgets(): array
    {

        return [
            DanhMucQuyResource\Widgets\ThongKeDanhMucQuy::class,
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
