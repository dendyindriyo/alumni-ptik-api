<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_beasiswa', 100);
            $table->date('waktu_beasiswa');
            $table->text('deskripsi_beasiswa');
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
        Schema::dropIfExists('beasiswa');
    }
}
