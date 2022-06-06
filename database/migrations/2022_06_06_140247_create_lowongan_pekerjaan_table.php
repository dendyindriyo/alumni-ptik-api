<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lowongan', 50);
            $table->text('deksripsi_lowongan');
            $table->date('waktu_lowongan');
            $table->string('alamat_lowongan', 255);
            $table->string('kontak_lowongan', 255);
            $table->string('foto_lowongan')->nullable();
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
        Schema::dropIfExists('lowongan_pekerjaan');
    }
}
