<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->string('kelas');
            $table->string('bulan_tagihan')->nullable();
            $table->string('jenis_tagihan');
            $table->double('jumlah_tagihan');
            $table->string('deskripsi')->nullable();
            $table->string('status');
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}
