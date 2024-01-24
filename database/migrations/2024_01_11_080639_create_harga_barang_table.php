<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_harga_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->string('harga_j')->nullable();
            $table->string('harga_tj')->nullable();
            $table->string('harga_b')->nullable();
            $table->integer('harga_tb')->nullable();
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('tbl_barang'); // Menambahkan foreign key untuk gambar_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_harga_barang');
    }
}
