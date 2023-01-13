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
        Schema::create('khai_tu', function (Blueprint $table) {
            $table->id();
            $table->date('ngayKhai');
            $table->date('ngayChet');
            $table->string('lyDoChet');
            $table->string('soGiayKhaiTu');
            $table->unsignedBigInteger('nguoiKhaiId')->unique();
            $table->foreign('nguoiKhaiId')->references('id')->on('users');
            $table->unsignedBigInteger('nguoiChetId')->unique();
            $table->foreign('nguoiChetId')->references('id')->on('nhan_khau');
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
        Schema::dropIfExists('khai_tus');
    }
};
