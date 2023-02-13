<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TamTru extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tam_tru';

    public function nhanKhau() {
        return $this->hasOne(NhanKhau::class, 'id', 'nhanKhauId');
    }
}
