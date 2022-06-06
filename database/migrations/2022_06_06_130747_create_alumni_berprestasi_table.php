<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniBerprestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_berprestasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prestasi', 100);
            $table->string('nama_alumni', 100);
            $table->year('waktu_prestasi');
            $table->string('foto_alumni')->nullable();
            $table->text('deskripsi_prestasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni_berprestasi');
    }
}
