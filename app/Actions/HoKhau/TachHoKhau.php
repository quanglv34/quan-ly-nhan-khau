<?php

namespace App\Actions\HoKhau;

use App\Models\HoKhau;
use App\Models\ThanhVienHoKhau;
use Illuminate\Database\Eloquent\Model;

class TachHoKhau
{
    public function handle($data)
    {
        $thongtinHoKhauMoi = $data['thongTinHoKhauMoi'];
        unset($data['hoKhauMoi']);
        $hoKhauCu = $data;
        return $this->tachHoKhau($thongtinHoKhauMoi);
    }

    public function tachHoKhau(array $data): Model
    {
        $nhanKhauCu = ThanhVienHoKhau::where('nhanKhauId', '=',
            $data['chuHoId'])->first();
        $nhanKhauCu?->deleteQuietly();

        $danhSachThanhVien = $data['thanhVien'];
        unset($data['thanhVien']);

        $hoKhau = (new TaoHoKhau())->handle($data);

        foreach ($danhSachThanhVien as $thanhVien) {
            $nhanKhauCu = ThanhVienHoKhau::where('nhanKhauId', '=',
                $thanhVien['nhanKhauId'])->first()?->deleteQuietly();

            $action = new ThemThanhVienHoKhau($hoKhau, $thanhVien['nhanKhauId'],
                $thanhVien['quanHeVoiChuHo']);
            $action->handle();
        }
        return $hoKhau;
    }

}
