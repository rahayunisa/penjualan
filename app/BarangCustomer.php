<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangCustomer extends Model
{
    //
    protected $table ='barangcustomers';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;

    public function transaksipenjualans () 
    {
    	return $this->belongsTo('App\TransaksiPenjualan' , 'id_transaksipenjualan');
    }

    public function customers () 
    {
        return $this->belongsTo('App\Customer' , 'id_customer');
    }
}
