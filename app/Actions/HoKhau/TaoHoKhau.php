<?php

namespace App\Actions\HoKhau;

use App\Models\HoKhau;
use App\Models\ThanhVienHoKhau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Validator;

class TaoHoKhau
{

    public function handle(array $data): Model|HoKhau
    {
        $validator = Validator::make($data, [
            'maHoKhau'        => 'unique:ho_khau,maHoKhau|required|max:255',
            'maKhuVuc'        => 'unique:ho_khau,maKhuVuc|required|max:255',
            'diaChi'          => 'required|max:255',
            'ngayLap'         => 'required|date',
            'nguoiThucHienId' => 'required|exists:users,id',
            'chuHoId'         => 'unique:thanh_vien_ho_khau,nhanKhauId',
        ], [
            'chuHoId.unique' => 'Thông tin chủ hộ đã có trong hộ khẩu khác.'
        ]);

        if($validator->stopOnFirstFailure()->fails()) {
            throw (new ValidationException($validator));
        }

        return $this->createHoKhau($data);
    }

    protected function createHoKhau(array $data): Model
    {
        $hoKhau = HoKhau::create($data);

        ThanhVienHoKhau::create([
            'nhanKhauId'     => $data['chuHoId'],
            'hoKhauId'       => $hoKhau->id,
            'quanHeVoiChuHo' => 'Chủ hộ',
        ]);


        return $hoKhau;
    }
}
