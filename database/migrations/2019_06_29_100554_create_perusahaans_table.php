<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelaku_usaha_id')->unsigned()->references('id')->on('pelaku_usaha');
            $table->string('nama');
            $table->string('alamat_lengkap');
            $table->bigInteger('provinsi_id');
            $table->bigInteger('kota_kabupaten_id');
            $table->string('nomor_handphone');
            $table->string('email');
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
        Schema::dropIfExists('perusahaan');
    }
}
