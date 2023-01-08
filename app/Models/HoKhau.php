<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class HoKhau extends Model
{
    use HasFactory;

    protected $table = 'ho_khau';

    public function thanhVien(): HasMany
    {
        return $this->hasMany(ThanhVienHoKhau::class, 'hoKhauId', 'id');
    }

    public function nhanKhau(): HasManyThrough
    {
        return $this->hasManyThrough(NhanKhau::class, ThanhVienHoKhau::class,
            'nhanKhauId', 'id', 'hoKhauId', 'id');
    }
}
