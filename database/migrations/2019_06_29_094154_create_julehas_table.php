<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJulehasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juleha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users');
            $table->bigInteger('instrumen_id')->unsigned()->references('id')->on('instrumen_jph');
            // Juleha
            $table->string('nama');
            // Alamat Juleha
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
        Schema::dropIfExists('juleha');
    }
}
