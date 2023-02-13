<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Actions\DanhMucQuy\TaoDanhMucQuy;
use App\Actions\HoKhau\ThemThanhVienHoKhau;
use App\Enums\LoaiDanhMucQuy;
use App\Enums\LoaiDanhMucQuyBatBuoc;
use App\Models\DanhMucQuy;
use App\Models\HoKhau;
use App\Models\NhanKhau;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::query()->firstOrCreate(
            [
                'email' => 'quanglv.share@gmail.com',
            ],
            [
                'name' => 'Vu-Quang Le',
                'password' => \Hash::make('admin@123'),
            ]
        );

        $danhSachChuHo = NhanKhau::factory(5)->create();

        foreach ($danhSachChuHo as $chuHo) {
            $hoKhau = HoKhau::factory()->create([
                'chuHoId' => $chuHo->id,
            ]);

            NhanKhau::factory(5)
                ->create()
                ->each(function ($thanhVien) use ($hoKhau) {
                    (new ThemThanhVienHoKhau($hoKhau, $thanhVien, 'Người thân'))->handle();
                });
        }

        DanhMucQuy::factory()->count(2)
            ->make(['loaiQuy' => 0])
            ->each(function ($danhMuc, $index) {
                $data = $danhMuc->attributesToArray();
                if ($danhMuc->loaiQuy === LoaiDanhMucQuy::BatBuoc->value) {
                    $data['soTienPhaiDong'] = 500000;
                    $data['loaiDanhMucQuyBatBuoc'] = $index;
                }

                (new TaoDanhMucQuy($data))->handle();
            });

        DanhMucQuy::factory()->count(1)
            ->make(['loaiQuy' => 1])
            ->each(function ($danhMuc) {
                $data = $danhMuc->attributesToArray();
                if ($danhMuc->loaiQuy === LoaiDanhMucQuy::BatBuoc->value) {
                    $data['soTienPhaiDong'] = 500000;
                    $data['loaiDanhMucQuyBatBuoc'] = random_int(0, 1);
                }

                (new TaoDanhMucQuy($data))->handle();
            });
    }
}
