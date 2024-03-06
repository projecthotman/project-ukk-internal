<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('kategori_id');
            $table->enum('status', ['beli', 'jual', 'terjual'])->default('jual');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('tbl_kategori');
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
        Schema::dropIfExists('tbl_barang');
    }
}
