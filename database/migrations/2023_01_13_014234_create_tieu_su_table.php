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
        Schema::create('tieu_su', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhanKhauId');
            $table->foreign('nhanKhauId')->references('id')->on('nhan_khau');
            $table->date('tuNgay');
            $table->date('denNgay');
            $table->string('diaChi');
            $table->string('ngheNghiep');
            $table->string('noiLamViec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tieu_sus');
    }
};
