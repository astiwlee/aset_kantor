<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
        $table->id('report_id');
        $table->string('nama_laporan');
        $table->string('tipe_laporan')->nullable();
        $table->date('tanggal_generate');
        $table->text('isi_laporan')->nullable(); // ini sih bisa pake text klu ga json ya tpi keknya pake text aja
        $table->foreignId('user_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('laporan');
    }
}
