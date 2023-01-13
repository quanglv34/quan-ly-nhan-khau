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
        Schema::create('thanh_vien_ho_khau', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hoKhauId');
            $table->foreign('hoKhauId')->references('id')->on('ho_khau');
            $table->unsignedBigInteger('nhanKhauId');
            $table->foreign('nhanKhauId')->references('id')->on('nhan_khau');
            $table->string('quanHeVoiChuHo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanh_vien_ho_khau');
    }
};
