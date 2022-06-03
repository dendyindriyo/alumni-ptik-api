<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPekerjaanAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pekerjaan_alumni', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('nim');
            $table->string('nama_pekerjaan', 50)->nullable();
            $table->string('nama_perusahaan', 50)->nullable();
            $table->year('tahun_mulai')->nullable();
            $table->year('tahun_selesai')->nullable();
            $table->string('lokasi_pekerjaan', 255)->nullable();
            $table->string('deskripsi_pekerjaan', 255)->nullable();
            $table->timestamps();
            $table->foreign('nim')
                ->references('nim')
                ->on('alumni')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pekerjaan_alumni');
    }
}
