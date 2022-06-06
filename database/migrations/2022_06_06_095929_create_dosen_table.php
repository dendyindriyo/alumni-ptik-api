<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip');
            $table->string('nama_dosen', 100);
            $table->string('nama_jabatan_dosen', 50);
            $table->string('foto_dosen')->nullable();
            $table->string('alamat_dosen', 255);
            $table->string('kontak_dosen', 100);
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
        Schema::dropIfExists('dosen');
    }
}
