<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->bigInteger('nim')->unsigned()->unique()->primary();
            $table->unsignedBigInteger('id_tahun_masuk')->nullable();
            $table->unsignedBigInteger('id_tahun_lulus')->nullable();
            $table->unsignedBigInteger('id_provinsi')->nullable();
            $table->unsignedBigInteger('id_peminatan')->nullable();
            $table->bigInteger('no_anggota_ika')->nullable();
            $table->string('nama_alumni', 100);
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 20);
            $table->string('status_pernikahan', 15);
            $table->year('tahun_masuk')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('peminatan', 30)->nullable();
            $table->string('alamat', 255);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kota', 50);
            $table->string('provinsi', 50)->nullable();
            $table->integer('kode_pos');
            $table->string('no_telp', 15);
            $table->string('email', 100);
            $table->string('foto_alumni')->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('tempat_tanggal_lahir_ayah', 50)->nullable();
            $table->string('nama_pekerjaan_ayah', 50)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('tempat_tanggal_lahir_ibu', 50)->nullable();
            $table->string('nama_pekerjaan_ibu', 50)->nullable();
            $table->string('nama_wali', 100)->nullable();
            $table->string('tempat_tanggal_lahir_wali', 50)->nullable();
            $table->string('nama_pekerjaan_wali', 50)->nullable();
            $table->timestamps();
            $table->foreign('id_tahun_masuk')
                ->references('id')
                ->on('tahun_masuk')
                ->onDelete('set null');
            $table->foreign('id_tahun_lulus')
                ->references('id')
                ->on('tahun_lulus')
                ->onDelete('set null');
            $table->foreign('id_provinsi')
                ->references('id')
                ->on('provinsi')
                ->onDelete('set null');
            $table->foreign('id_peminatan')
                ->references('id')
                ->on('peminatan')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni');
    }
}
