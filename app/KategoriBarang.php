<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    //
    protected $table ='kategoribarangs';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;


    public function transaksipenjualans () 
    {
    	return $this->hasMany('App\TransaksiPenjualan' , 'id_kategoribarang');
    }

    public function transaksipembelians () 
    {
    	return $this->hasMany('App\TransaksiPmbelian' , 'id_kategoribarang');
    }
}
