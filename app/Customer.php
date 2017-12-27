<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table ='customers';
    protected $fillable = ['*'];
    protected $visible = ['*'];
    public $timestamps = true;

    public function transaksipenjualans () 
    {
    	return $this->hasMany('App\TransaksiPenjualan' , 'id_customer');
    }

    public function barangcustomers () 
    {
    	return $this->hasMany('App\BarangCustomers' , 'id_customer');
    }
}
