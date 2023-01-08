<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_khau', function (Blueprint $table) {
            $table->id();
            $table->string('maHoKhau')->unique();
            $table->string('maKhuVuc');
            $table->string('diaChi');
            $table->date('ngayLap');
            $table->date('ngayChuyenDi');
            $table->string('lyDoChuyen');
            $table->unsignedBigInteger('nguoiThucHienId');
            $table->foreign('nguoiThucHienId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ho_khaus');
    }
};
