<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    //
    protected $table ='transaksipenjualans';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;
    
    public function customers () 
    {
    	return $this->belongsTo('App\Customer', 'id_customer');

    }

    public function kategoribarangs () 
    {
    	return $this->belongsTo('App\KategoriBarang' , 'id_kategoribarang');
    }
}
