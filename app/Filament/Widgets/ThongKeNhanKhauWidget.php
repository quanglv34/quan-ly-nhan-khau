<?php

namespace App\Filament\Widgets;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use App\Models\TamTru;
use App\Models\TamVang;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ThongKeNhanKhauWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $soNhanKhau = NhanKhau::with('khaiTu')
            ->whereNull('ngayChuyenDi')->get()
            ->filter(fn ($nhanKhau) => is_null($nhanKhau->khaiTu))
            ->count();
        return [
            Card::make('Hộ khẩu', HoKhau::whereNull('ngayChuyenDi')->count()),
            Card::make('Nhân khẩu', $soNhanKhau),
            Card::make('Tạm trú', TamTru::whereDate('denNgay', '>=', today())->count()),
            Card::make('Tạm vắng', TamVang::whereDate('denNgay', '>=', today())->count()),
        ];
    }
}
