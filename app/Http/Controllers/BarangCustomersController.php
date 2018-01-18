<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangCustomer;
use App\Customer;
use App\TransaksiPenjualan;
use App\StokBarang;
use Alert;
use DB;
use Session;

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
        $stokbarang = StokBarang::all();
        $barangcustomer = BarangCustomer::all();
        $customer= Customer::all();
        $transaksipenjualan = TransaksiPenjualan::all();
        return view ('barangcustomers.index',compact('barangcustomer','transaksipenjualan','customer','kategoribarang','stokbarang'));
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
        $b = StokBarang::findOrFail($request->id_stokbarang);
        if($request->jumlah > $b->stok){
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Jumlah order barang ($request->jumlah) melebihi jumlah stok barang ($b->stok)"]);
            return redirect('/barangcustomers');
        }else{
            $request->validate([
                'id_stokbarang' => 'required',
                'id_transaksipenjualan'  => 'required',
                'jumlah' => 'required|numeric|min:1',
            ],
            [
                'jumlah.required'    => 'Kolom jumlah tidak boleh kosong',
                'jumlah.min'    => 'Kolom jumlah minimal di isi 1',
            ]);
            $barangcustomer = new BarangCustomer;
            $barangcustomer->id_transaksipenjualan = $request->id_transaksipenjualan;
            $barangcustomer->id_stokbarang = $request->id_stokbarang;
            $barangcustomer->id_kategoribarang = $request->id_kategoribarang;
            $barangcustomer->jumlah = $request->jumlah;
            $harga = StokBarang::find($request->id_stokbarang);
            $harga->stok = $harga->stok - $request->jumlah;
            $harga->save();
            $barangcustomer->harga_beli = $request->jumlah * $harga->harga;
            $barangcustomer->save();
            Alert::success('Tambah Data','Berhasil')->autoclose(1500);
            return redirect('/barangcustomers');
        }


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
        $barangcustomer = BarangCustomer::findOrFail($id);
        $barangcustomer->id_transaksipenjualan = $request->id_transaksipenjualan;
        $barangcustomer->id_kategoribarang = $request->id_kategoribarang;
        $harga = StokBarang::find($request->id_stokbarang);
        $harga->stok = ($harga->stok + $barangcustomer->jumlah) - $request->jumlah;
        $barangcustomer->jumlah = $request->jumlah;
        $harga->save();
        $barangcustomer->harga_beli = $request->jumlah * $harga->harga;
        $barangcustomer->save();
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

     public function deleteAll()
    {
        DB::table('barangcustomers')->delete();
        return redirect('barangcustomers');
    }

    public function error()
    {
        return view('errors.404');
    }

}
