<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KhaiTu extends Model
{
    use HasFactory;
    protected $table = 'khai_tu';

    public function nguoiChet(): BelongsTo {
        return $this->belongsTo(NhanKhau::class, 'nguoiChetId', 'id');
    }

    public function nguoiKhai(): BelongsTo {
        return $this->belongsTo(NhanKhau::class, 'nguoiKhaiId', 'id');
    }
}
