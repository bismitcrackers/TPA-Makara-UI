<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->string('pembuat')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tema')->nullable();
            $table->string('subtema')->nullable();
            $table->string('keterangan_fisik')->nullable();
            $table->string('keterangan_kognitif')->nullable();
            $table->string('keterangan_sosial')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('snack')->nullable();
            $table->string('makan_siang')->nullable();
            $table->string('tidur_siang')->nullable();
            $table->string('catatan_khusus')->nullable();
            $table->string('url_lampiran')->nullable();
            $table->string('kelas');
            $table->boolean('dibaca');
            $table->boolean('dipublish');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_books');
    }
}
