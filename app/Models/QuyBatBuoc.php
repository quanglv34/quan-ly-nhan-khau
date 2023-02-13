<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyBatBuoc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'quy_bat_buoc';

    public function hoKhau() {
        return $this->belongsTo(HoKhau::class, 'hoDongId', 'id');
    }

    public function dongQuy() {
        return $this->hasMany(DongQuy::class, ['danhMucQuyId', 'hoDongId'], ['danhMucQuyId', 'hoDongId']);
    }

    public function daHoanThanh() {
        return $this->soTienPhaiDong <= $this->soTienDong;
    }
}
