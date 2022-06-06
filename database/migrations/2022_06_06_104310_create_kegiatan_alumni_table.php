<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 50);
            $table->text('deskripsi_kegiatan');
            $table->date('waktu_kegiatan');
            $table->string('tempat_kegiatan', 255);
            $table->string('foto_kegiatan')->nullable();
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
        Schema::dropIfExists('kegiatan_alumni');
    }
}
