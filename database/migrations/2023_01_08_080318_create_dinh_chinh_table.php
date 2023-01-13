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
            $table->unsignedBigInteger('hoKhauId');
            $table->foreign('hoKhauId')->references('id')->on('ho_khau');

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
