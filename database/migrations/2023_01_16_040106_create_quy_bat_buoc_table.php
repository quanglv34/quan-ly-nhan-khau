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
            $table->foreignId('hoDongId')->references('id')->on('ho_khau');
            $table->foreignId('danhMucQuyId')->references('id')->on('danh_muc_quy');
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
