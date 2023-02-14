<?php

namespace App\Actions\DanhMucQuy;

use App\Enums\LoaiDanhMucQuy;
use App\Enums\LoaiDanhMucQuyBatBuoc;
use App\Models\DanhMucQuy;
use App\Models\HoKhau;
use App\Models\QuyBatBuoc;
use Psy\Readline\Hoa\ConsoleOutput;

class TaoDanhMucQuy
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $this->taoDanhMucQuy();
    }

    public function taoDanhMucQuy()
    {

        $danhMuc = DanhMucQuy::create([
            'tenQuy' => $this->data['tenQuy'],
            'ngayKetThuc' => $this->data['ngayKetThuc'],
            'ngayBatDau' => $this->data['ngayBatDau'],
            'loaiQuy' => $this->data['loaiQuy'],
        ]);


        if ($danhMuc->loaiQuy == LoaiDanhMucQuy::BatBuoc->value) {
            $danhSachHoKhau = HoKhau::all();
            foreach ($danhSachHoKhau as $hoKhau) {
                $soTienPhaiDong = $this->data['soTienPhaiDong'];
                $loaiDanhMucQuyBatBuoc = $this->data['loaiDanhMucQuyBatBuoc'];
                if ($loaiDanhMucQuyBatBuoc === LoaiDanhMucQuyBatBuoc::TheoThanhVien->value) {
                    $soTienPhaiDong = $hoKhau->thanhVien()->count() * $soTienPhaiDong;
                }

                QuyBatBuoc::create([
                    'hoDongId' => $hoKhau->id,
                    'danhMucQuyId' => $danhMuc->id,
                    'loaiDanhMucQuyBatBuoc' => $loaiDanhMucQuyBatBuoc,
                    'soTienPhaiDong' => $soTienPhaiDong,
                ]);
            }
        }

        return $danhMuc;
    }
}
