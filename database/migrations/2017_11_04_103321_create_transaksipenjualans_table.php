<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksipenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksipenjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banyak_barang');
            $table->date('tanggal_terjual');
            $table->integer('id_kategoribarang')->unsigned();
            $table->foreign('id_kategoribarang')->references('id')->on('kategoribarangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('transaksipenjualans');
    }
}
