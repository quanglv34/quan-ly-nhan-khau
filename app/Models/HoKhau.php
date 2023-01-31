<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HoKhau extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'ho_khau';

    public function nguoiThucHien(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nguoiThucHienId', 'id');
    }

    public function chuHo(): BelongsTo
    {
        return $this->belongsTo(NhanKhau::class, 'chuHoId', 'id');
    }

    public function thanhVien(): HasMany
    {
        return $this->hasMany(ThanhVienHoKhau::class, 'hoKhauId', 'id');
    }

    public function dinhChinh(): HasMany {
        return $this->hasMany(DinhChinh::class, 'hoKhauId', 'id');
    }
}
