<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangSupplier;
use App\Supplier;
use App\TransaksiPembelian;
use Alert;

class BarangSuppliersController extends Controller
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
        return view ('barangsuppliers.index',compact('barang','transaksipembelian','supplier'));
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
        $barang = new BarangSupplier;
        $barang->id_transaksipembelian = $request->id_transaksipembelian;
        $barang->id_supplier = $request->id_supplier;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->stok = $request->stok;
        $barang->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('barangsuppliers');
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
        $barang = BarangSupplier::findOrFail($id);
        $barang->id_transaksipembelian = $request->id_transaksipembelian;
        $barang->id_supplier = $request->id_supplier;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->stok = $request->stok;
        $barang->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('barangsuppliers');
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
        $barang=BarangSupplier::find($id);
        BarangSupplier::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('barangsuppliers');
    }
}
