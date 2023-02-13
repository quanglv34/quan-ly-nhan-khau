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
        Schema::create('quy_bat_buoc', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('loaiDanhMucQuyBatBuoc')->default(0);
            $table->unsignedBigInteger('soTienPhaiDong')->default(0);
            $table->unsignedBigInteger('soTienDong')->nullable();
            $table->foreignId('hoDongId')->references('id')->on('ho_khau');
            $table->foreignId('danhMucQuyId')->references('id')->on('danh_muc_quy');
            $table->foreignId('nguoiDongId')->nullable()->references('id')->on('nhan_khau');
            $table->date('ngayDong')->nullable();
            $table->timestamps();
            $table->unique(['hoDongId', 'danhMucQuyId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quy_bat_buocs');
    }
};
