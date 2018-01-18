<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangSupplier;
use App\Supplier;
use App\TransaksiPembelian;
use App\StokBarang;
use Alert;
use DB;

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
        $stokbarang = StokBarang::all();
        $barang = BarangSupplier::all();
        $supplier= Supplier::all();
        $transaksipembelian = TransaksiPembelian::all();
        return view ('barangsuppliers.index',compact('barang','transaksipembelian','supplier','stokbarang'));
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
            $request->validate([
                'jumlah' => 'required|numeric|min:1',
            ],
            [
                'jumlah.required'    => 'Kolom jumlah tidak boleh kosong',
                'jumlah.min'    => 'Kolom jumlah minimal di isi 1',
            ]);
        $bebas = $request->all();
        $stokbarang=StokBarang::where('id', $bebas['id_stokbarang'])->first();

        $barang = new BarangSupplier;
        $barang->id_stokbarang = $request->id_stokbarang;
        $barang->id_transaksipembelian = $request->id_transaksipembelian;
        $barang->id_supplier = $request->id_supplier;
        $barang->id_kategoribarang = $request->id_kategoribarang;
        $barang->jumlah = $request->jumlah;
        $harga = StokBarang::find($request->id_stokbarang);
        $harga->stok = $harga->stok + $request->jumlah;
        $harga->save();
        $barang->harga_beli = $request->jumlah * $harga->harga;
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
        $bebas = $request->all();
        $stokbarang=StokBarang::where('id', $bebas['id_stokbarang'])->first();

        $barang = BarangSupplier::findOrFail($id);
        $barang->id_stokbarang = $request->id_stokbarang;
        $barang->id_transaksipembelian = $request->id_transaksipembelian;
        $barang->id_supplier = $request->id_supplier;
        $barang->id_kategoribarang = $request->id_kategoribarang;
        $harga = StokBarang::find($request->id_stokbarang);
        $harga->stok = ($harga->stok - $barang->jumlah) + $request->jumlah;
        $barang->jumlah = $request->jumlah;
        $harga->save();
        $barang->harga_beli = $request->jumlah * $harga->harga;
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

     public function deleteAll()
    {
        DB::table('barangsuppliers')->delete();
        return redirect('barangsuppliers');
    }

}
