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
        Schema::create('danh_muc_quy', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('loaiQuy');
            $table->string('tenQuy');
            $table->date('ngayBatDau')->nullable();
            $table->date('ngayKetThuc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_muc_quies');
    }
};
