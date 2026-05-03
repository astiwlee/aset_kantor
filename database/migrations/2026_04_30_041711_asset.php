<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
        $table->bigIncrements('asset_id');
        $table->string('nama_asset');
        $table->foreignId('kategori_id')->references('kategori_id')->on('kategori');
        $table->foreignId('lokasi_id')->references('lokasi_id')->on('lokasi');
        $table->enum('status', ['baik','rusak','hilang','dipinjam']);
        $table->date('tanggal_dibeli')->nullable();
        $table->decimal('harga', 15 ,2 )->nullable();
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
        Schema::dropIfExists('asset');
    }
}
