<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepengurusanIkaPtikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepengurusan_ika_ptik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan_ika', 50);
            $table->bigInteger('no_anggota_ika');
            $table->string('nama_alumni', 100);
            $table->string('foto_alumni')->nullable();
            $table->string('alamat_alumni', 255);
            $table->string('kontak_alumni', 100);
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->boolean('aktif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kepengurusan_ika_ptik');
    }
}
