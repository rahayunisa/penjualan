<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangSupplier;
use App\Supplier;
use App\StokBarang;
use App\TransaksiPembelian;
use Alert;
use DB;

class TransaksiPembeliansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = BarangSupplier::all();
        $supplier= Supplier::all();
        $transaksipembelian = TransaksiPembelian::all();
        return view ('transaksipembelians.index',compact('transaksipembelian','supplier','barang'));

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
        $transaksipembelian = new TransaksiPembelian;
        $transaksipembelian->id_supplier = $request->id_supplier;
        $transaksipembelian->tanggal_beli = $request->d;
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        $transaksipembelian->save();
        return redirect('transaksipembelians');
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
        $transaksipembelian = TransaksiPembelian::findOrFail($id);
        $transaksipembelian->id_supplier = $request->id_supplier;
        $transaksipembelian->tanggal_beli = $request->d;
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        $transaksipembelian->save();
        return redirect('transaksipembelians');
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
        $transaksipembelian=TransaksiPembelian::find($id);
        TransaksiPembelian::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('transaksipembelians');
    }

     public function deleteAll()
    {
        DB::table('transaksipembelians')->delete();
        return redirect('transaksipembelians');
    }

}
