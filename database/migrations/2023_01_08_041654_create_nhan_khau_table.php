<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_khau', function (Blueprint $table) {
            $table->id();

            $table->string('maNhanKhau')->unique();

            $table->string('hoVaTen');
            $table->date('ngaySinh');
            $table->unsignedTinyInteger('gioiTinh');
            $table->string('queQuan');

            $table->date('ngayChuyenDen')->nullable();
            $table->string('lyDoChuyenDen')->nullable();

            $table->date('ngayChuyenDi')->nullable();
            $table->string('lyDoChuyenDi')->nullable();
            $table->string('diaChiMoi')->nullable();

            $table->string('ghiChu')->nullable();
            $table->date('ngayTao')->nullable();
            $table->unsignedBigInteger('nguoiTaoId')->nullable();
            $table->foreign('nguoiTaoId')->references('id')->on('users')
                ->nullOnDelete();

            $table->string('lyDoXoa')->nullable();
            $table->date('ngayXoa')->nullable();
            $table->unsignedBigInteger('nguoiXoaId')->nullable();
            $table->foreign('nguoiXoaId')->references('id')->on('users')
                ->nullOnDelete();

            $table->string('maNhanKhauVaHoVaTen')->virtualAs('concat(\'(\',maNhanKhau, \') \', hoVaTen)');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhan_khaus');
    }
};
