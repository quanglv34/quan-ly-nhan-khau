<?php

namespace App\Actions\DanhMucQuy;

use App\Enums\LoaiDanhMucQuy;
use App\Models\DanhMucQuy;
use App\Models\HoKhau;
use App\Models\QuyBatBuoc;

class TaoDanhMucQuy
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle() {
        $this->taoDanhMucQuy();
    }

    public function taoDanhMucQuy() {
        $danhMuc = DanhMucQuy::factory()->create($this->data);
        if($danhMuc->loaiQuy == LoaiDanhMucQuy::BatBuoc->value) {
            $danhSachHoKhau = HoKhau::all();

            foreach ($danhSachHoKhau as $hoKhau) {
                QuyBatBuoc::create([
                    'hoDongId' => $hoKhau->id,
                    'danhMucQuyId' => $danhMuc->id,
                ]);
            }
        }

        return $danhMuc;
    }
}
