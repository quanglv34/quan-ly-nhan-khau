<?php

namespace App\Actions\HoKhau;

use App\Models\HoKhau;
use App\Models\NhanKhau;
use App\Models\ThanhVienHoKhau;

class ThemThanhVienHoKhau
{
    protected HoKhau $hoKhau;
    protected NhanKhau $nhanKhau;
    protected string $quanHeVoiChuHo;

    public function __construct(
        HoKhau $hoKhau,
        NhanKhau $nhanKhau,
        string $quanHeVoiChuHo
    ) {
        $this->hoKhau = $hoKhau;
        $this->nhanKhau = $nhanKhau;
        $this->quanHeVoiChuHo = $quanHeVoiChuHo;
    }

    public function handle()
    {
        return ThanhVienHoKhau::create([
            'hoKhauId'       => $this->hoKhau->id,
            'nhanKhauId'     => $this->nhanKhau->id,
            'quanHeVoiChuHo' => $this->quanHeVoiChuHo,
        ]);
    }

}
