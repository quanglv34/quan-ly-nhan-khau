<?php

namespace App\Filament\Resources\DanhMucQuyResource\Widgets;

use App\Enums\LoaiDanhMucQuy;
use App\Models\DanhMucQuy;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ThongKeDanhMucQuy extends BaseWidget
{

    public ?DanhMucQuy $record = null;
    protected function getCards(): array
    {
        $cards = [];
        if($this->record->loaiQuy === LoaiDanhMucQuy::BatBuoc->value) {
             $cards[] = Card::make(
                 'Số hộ đã hoàn thành',
                 $this->record->quyBatBuoc->filter(fn ($record) => $record->daHoanThanh())->count()
             );
             $cards[] = Card::make(
                 'Số hộ còn phải thu',
                 $this->record->quyBatBuoc->filter(fn ($record) => !$record->daHoanThanh())->count()
             );
            $cards[] = Card::make(
                'Số tiền đã đóng',
                number_format($this->record->quyBatBuoc->filter(fn ($record) => $record->daHoanThanh())->sum('soTienDong'))
            );
            $cards[] = Card::make(
                'Số tiền còn phải thu',
                number_format($this->record->quyBatBuoc->filter(fn ($record) => !$record->daHoanThanh())->sum('soTienPhaiDong'))
            );
        }
        return $cards;
    }
}
