<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangsuppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_stokbarang')->unsigned();
            $table->foreign('id_stokbarang')->references('id')->on('stok_barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('id_kategoribarang')->unsigned();
            $table->foreign('id_kategoribarang')->references('id')->on('kategoribarangs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_transaksipembelian')->unsigned();
            $table->foreign('id_transaksipembelian')->references('id')->on('transaksipembelians')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id')->on('suppliers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('barangsuppliers');
    }
}
