<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelakuUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaku_usaha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users');
            $table->string('nama');
            $table->string('alamat_lengkap');
            $table->bigInteger('provinsi_id');
            $table->bigInteger('kota_kabupaten_id');
            $table->bigInteger('provinsi_tl_id');
            $table->bigInteger('kota_kabupaten_tl_id');
            $table->date('tanggal_lahir');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->string('sosmed');
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
        Schema::dropIfExists('pelaku_usaha');
    }
}
