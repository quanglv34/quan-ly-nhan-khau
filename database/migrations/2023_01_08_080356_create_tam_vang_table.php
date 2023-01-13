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
        Schema::create('tam_vang', function (Blueprint $table) {
            $table->id();
            $table->string('maGiayTamTru', 50);
            $table->string('noiTamTru');
            $table->string('lyDo')->nullable();
            $table->date('tuNgay');
            $table->date('denNgay');
            $table->unsignedBigInteger('nhanKhauId');
            $table->foreign('nhanKhauId')->references('id')->on('nhan_khau');
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
        Schema::dropIfExists('tam_vangs');
    }
};
