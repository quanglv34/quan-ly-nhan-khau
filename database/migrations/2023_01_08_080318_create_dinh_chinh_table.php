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
        Schema::create('dinh_chinh', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoKhauId')->references('id')->on('ho_khau');
            $table->string('thongTinThayDoi', 100);
            $table->string('thayDoiTu', 100);
            $table->string('thayDoiThanh', 100);
            $table->date('ngayThayDoi');
            $table->foreignId('nguoiThayDoiId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dinh_chinhs');
    }
};
