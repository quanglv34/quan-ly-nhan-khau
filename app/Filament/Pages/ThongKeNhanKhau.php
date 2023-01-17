<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ThongKeNhanKhau extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'Thống kê nhân khẩu';
    protected static ?string $navigationGroup = 'Quản lý nhân khẩu';

    protected static string $view = 'filament.pages.thong-ke-nhan-khau';
}
