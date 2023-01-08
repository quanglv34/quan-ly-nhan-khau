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
        Schema::create('chung_minh_thu', function (Blueprint $table) {
            $table->id();
            $table->string('soCMT');
            $table->string('hoVaTen');
            $table->date('ngaySinh');
            $table->unsignedTinyInteger('gioiTinh');
            $table->string('queQuan');
            $table->string('noiCap');
            $table->date('ngayCap');

            $table->unsignedBigInteger('nhanKhauId');
            $table->foreign('nhanKhauId')->references('id')
                ->on('nhan_khau')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chung_minh_thus');
    }
};
