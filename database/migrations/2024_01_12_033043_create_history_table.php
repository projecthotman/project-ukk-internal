<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_history', function (Blueprint $table) {
            $table->id();
            $table->string('id_transk')->default(Str::uuid()->toString());
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_user');
            $table->string('nama');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->datetime('tanggal');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_history');
    }
}
