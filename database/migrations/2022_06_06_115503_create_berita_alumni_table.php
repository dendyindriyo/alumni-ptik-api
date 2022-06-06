<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama_berita', 50);
            $table->text('isi_berita');
            $table->date('waktu_berita');
            $table->string('tempat_berita', 255);
            $table->string('foto_berita')->nullable();
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
        Schema::dropIfExists('berita_alumni');
    }
}
