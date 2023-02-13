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
        Schema::create('quy_dong_gop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('danhMucQuyId')->references('id')->on('danh_muc_quy');
            $table->foreignId('nguoiDongId')->references('id')->on('nhan_khau');
            $table->foreignId('hoDongId')->references('id')->on('ho_khau');
            $table->unsignedBigInteger('soTienDong');
            $table->date('ngayDong')->default(today());
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
        Schema::dropIfExists('thu_quies');
    }
};
