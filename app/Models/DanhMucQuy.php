<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DanhMucQuy extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'danh_muc_quy';

    public function quyDongGop(): HasMany {
        return $this->hasMany(QuyDongGop::class, 'danhMucQuyId', 'id');
    }

    public function quyBatBuoc(): HasMany {
        return $this->hasMany(QuyBatBuoc::class, 'danhMucQuyId', 'id');
    }
}
