<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyeliaHalalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyelia_halal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users');
            $table->bigInteger('instrumen_id')->unsigned()->references('id')->on('instrumen_jph');
            $table->bigInteger('halal_center_id')->unsigned()->references('id')->on('halal_center');
            // Penyelia
            $table->string('nama');
            // Alamat Penyelia
            $table->string('alamat_lengkap');
            $table->bigInteger('provinsi_id');
            $table->bigInteger('kota_kabupaten_id');
            // Tempat Lahir Belum
            $table->bigInteger('provinsi_tl_id');
            $table->bigInteger('kota_kabupaten_tl_id');
            $table->date('tanggal_lahir');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->string('sosmed');
            $table->string('pendidikan_terakhir');
            $table->string('foto')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('transkip')->nullable();
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
        Schema::dropIfExists('penyelia_halal');
    }
}
