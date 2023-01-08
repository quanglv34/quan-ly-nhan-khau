<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
