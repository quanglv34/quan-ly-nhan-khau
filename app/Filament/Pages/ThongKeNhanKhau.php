<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\ThongKeNhanKhauWidget;
use Closure;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

class ThongKeNhanKhau extends Page
{
    protected static ?string $title = 'Thống kê nhân khẩu';

    protected static ?int $navigationSort = -2;
    protected static ?string $navigationGroup = 'Quản lý nhân khẩu';

    protected static string $view = 'filament.pages.thong-ke-nhan-khau';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected function getHeaderWidgets(): array
    {
        return [
            ThongKeNhanKhauWidget::class,
        ];
    }
}
