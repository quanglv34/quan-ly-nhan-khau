<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ThanhVienHoKhau extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'thanh_vien_ho_khau';

    public function nhanKhau(): BelongsTo {
        return $this->belongsTo(NhanKhau::class, 'nhanKhauId', 'id');
    }
}
