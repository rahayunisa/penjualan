<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    //
    public function barangsuppliers () 
    {
        return $this->hasMany('App\BarangSupplier' , 'id_stokbarang');
    }

    public function barangcustomers () 
    {
        return $this->hasMany('App\BarangCustomer' , 'id_stokbarang');
    }

    public function transaksipembelians () 
    {
        return $this->hasMany('App\TransaksiPembelian' , 'id_stokbarang');
    }
}
