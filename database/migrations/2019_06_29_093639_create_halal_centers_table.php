<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHalalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halal_center', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users');
            $table->bigInteger('instrumen_id')->unsigned()->references('id')->on('instrumen_jph');
            // Lembaga
            $table->string('nama_lembaga');
            // Alamat Lembaga
            $table->string('alamat_lengkap');
            $table->bigInteger('provinsi_id');
            $table->bigInteger('kota_kabupaten_id');
            $table->string('nomor_handphone');
            $table->string('email');
            // Narahubung
            $table->string('nama_narahubung');
            $table->string('cp_narahubung');
            $table->string('ktp_narahubung')->nullable();
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
        Schema::dropIfExists('halal_center');
    }
}
