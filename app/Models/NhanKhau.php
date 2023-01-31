<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NhanKhau extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nhan_khau';

    public function chungMinhThu(): HasOne
    {
        return $this->hasOne(ChungMinhThu::class, 'nhanKhauId', 'id');
    }

    public function tamTru(): HasOne {
        return  $this->hasOne(TamTru::class, 'nhanKhauId', 'id');
    }

    public function tamVang(): HasOne {
        return  $this->hasOne(TamVang::class, 'nhanKhauId', 'id');
    }

    public function khaiTu(): HasOne {
        return  $this->hasOne(KhaiTu::class, 'nguoiChetId', 'id');
    }

    public function tieuSu(): HasMany
    {
        return $this->hasMany(TieuSu::class, 'nhanKhauId', 'id');
    }
}
