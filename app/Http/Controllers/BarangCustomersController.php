<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangCustomer;
use App\Customer;
use App\TransaksiPenjualan;
use Alert;

class BarangCustomersController extends Controller
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
        return view ('barangcustomers.index',compact('barangcustomer','transaksipenjualan','customer'));
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
        $barangscustomer = new BarangCustomer;
        $barangscustomer->id_customer = $request->id_customer;
        $barangscustomer->id_transaksipenjualan = $request->id_transaksipenjualan;
        $barangscustomer->nama_barang = $request->nama_barang;
        $barangscustomer->harga_jual = $request->harga_jual;
        $barangscustomer->harga_beli = $request->harga_beli;
        $barangscustomer->stok = $request->stok;
        $barangscustomer->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('barangcustomers');
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
        $barangcustomer = BarangCustomer::findOrFail($id);
        $barangscustomer->id_customer = $request->id_customer;
        $barangscustomer->id_transaksipenjualan = $request->id_transaksipenjualan;

        $barangscustomer->nama_barang = $request->nama_barang;
        $barangscustomer->harga_jual = $request->harga_jual;
        $barangscustomer->harga_beli = $request->harga_beli;
        $barangscustomer->stok = $request->stok;
        $barangscustomer->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('barangcustomers');
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
        $barangcustomer=BarangCustomer::find($id);
        BarangCustomer::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('barangcustomers');
    }
}
