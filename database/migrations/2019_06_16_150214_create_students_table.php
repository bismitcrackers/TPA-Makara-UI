<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->string('agama');
            $table->string('alamat_rumah');
            $table->string('telepon_rumah');
            $table->string('anak_ke');
            $table->string('catatan_medis')->nullable();
            $table->string('penyakit_berat')->nullable();
            $table->string('keadaan_khusus')->nullable();
            $table->string('sifat_baik')->nullable();
            $table->string('sifat_diperhatikan')->nullable();
            $table->string('kelas')->nullable();
            $table->boolean('lulus')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
