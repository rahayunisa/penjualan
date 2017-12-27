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
}
