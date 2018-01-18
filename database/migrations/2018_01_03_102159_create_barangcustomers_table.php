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
            $table->integer('id_stokbarang')->unsigned();
            $table->foreign('id_stokbarang')->references('id')->on('stok_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('id_kategoribarang')->unsigned();
            $table->foreign('id_kategoribarang')->references('id')->on('kategoribarangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_transaksipenjualan')->unsigned();
            $table->foreign('id_transaksipenjualan')->references('id')->on('transaksipenjualans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('harga_beli');
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
