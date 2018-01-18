<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    //
    protected $table ='transaksipembelians';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;

    public function suppliers () 
    {
        return $this->belongsTo('App\Supplier', 'id_supplier');

    }

    public function kategoribarangs () 
    {
        return $this->belongsTo('App\KategoriBarang' , 'id_kategoribarang');
    }

    public function stokbarangs () 
    {
        return $this->belongsTo('App\StokBarang' , 'id_stokbarang');
    }
}
