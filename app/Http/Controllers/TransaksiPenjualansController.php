<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangCustomer;
use App\Customer;
use App\TransaksiPenjualan;
use Alert;
use DB;

class TransaksiPenjualansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangcustomer = BarangCustomer::all();
        $customer= Customer::all();
        $transaksipenjualan = TransaksiPenjualan::all();
        return view ('transaksipenjualans.index',compact('transaksipenjualan','customer','barangcustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $transaksipenjualan = new TransaksiPenjualan;
        $transaksipenjualan->tanggal_beli = $request->d;
        $transaksipenjualan->nama_customer = $request->nama_customer;
        $transaksipenjualan->alamat = $request->alamat;
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        $transaksipenjualan->save();
        return redirect('transaksipenjualans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $transaksipenjualan = TransaksiPenjualan::findOrFail($id);
        $transaksipenjualan->tanggal_beli = $request->d;
        $transaksipenjualan->nama_customer = $request->nama_customer;
        $transaksipenjualan->alamat = $request->alamat;
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        $transaksipenjualan->save();
        return redirect('transaksipenjualans');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksipenjualan=TransaksiPenjualan::find($id);
        TransaksiPenjualan::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('transaksipenjualans');
    }

     public function deleteAll()
    {
        DB::table('transaksipenjualans')->delete();
        return redirect('transaksipenjualans');
    }

}
