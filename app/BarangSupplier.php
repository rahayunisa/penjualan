<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangSupplier extends Model
{
    //
    protected $table ='barangsuppliers';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;

    public function transaksipembelians () 
    {
        return $this->belongsTo('App\TransaksiPembelian' , 'id_transaksipembelian');
    }

    public function suppliers () 
    {
        return $this->belongsTo('App\Supplier' , 'id_supplier');
    }

    public function kategoribarangs () 
    {
        return $this->belongsTo('App\KategoriBarang' , 'id_kategoribarang');
    }

    public function barangsuppliers () 
    {
        return $this->hasMany('App\BarangSupplier' , 'id_barangsupplier');
    }

    public function stokbarangs () 
    {
        return $this->belongsTo('App\StokBarang' , 'id_stokbarang');
    }
}
