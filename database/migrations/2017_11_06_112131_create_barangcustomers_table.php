<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangcustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangcustomers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->integer('id_transaksipenjualan')->unsigned();
            $table->foreign('id_transaksipenjualan')->references('id')->on('transaksipenjualans')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('harga_jual');
            $table->string('harga_beli');
            $table->integer('stok');
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
        Schema::dropIfExists('barangcustomers');
    }
}
