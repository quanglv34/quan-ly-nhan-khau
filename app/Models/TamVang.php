<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamVang extends Model
{
    use HasFactory;
    protected $table = 'tam_vang';

    public function nhanKhau() {
        return $this->hasOne(NhanKhau::class, 'id', 'nhanKhauId');
    }
}
