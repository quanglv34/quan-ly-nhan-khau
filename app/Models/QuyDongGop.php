<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuyDongGop extends Model
{
    use HasFactory;
    protected $table = 'quy_dong_gop';

    public function nguoiDong(): BelongsTo {
        return $this->belongsTo(NhanKhau::class, 'nguoiDongId', 'id');
    }

    public function hoDong(): BelongsTo {
        return $this->belongsTo(HoKhau::class, 'hoDongId', 'id');
    }
}
