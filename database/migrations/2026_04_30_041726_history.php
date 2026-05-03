<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class History extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
        $table->bigIncrements('history_id');
        $table->foreignId('asset_id')->references('asset_id')->on('asset');
        $table->date('tanggal_update');
        $table->enum('status_baru', ['baik','rusak','hilang','dipinjam']);
        $table->text('catatan')->nullable();
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
        Schema::dropIfExists('history');
    }
}
