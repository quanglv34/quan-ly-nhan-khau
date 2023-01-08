<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ChungMinhThu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chung_minh_thu';

    public function nhanKhau(): BelongsTo
    {
        return $this->belongsTo(NhanKhau::class, 'chungMinhThuId', 'id');
    }
}
