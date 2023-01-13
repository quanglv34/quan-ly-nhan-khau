<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DinhChinh extends Model
{
    use HasFactory;
    protected $table = 'dinh_chinh';
    public $timestamps = false;

    public function hoKhau(): BelongsTo {
        return $this->belongsTo(HoKhau::class, 'hoKhauId', 'id');
    }
}
