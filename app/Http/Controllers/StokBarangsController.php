<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokBarang;
use Alert;
use DB;

class StokBarangsController extends Controller
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
        return view ('stokbarangs.index',compact('stokbarang'));

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
                'nama_barang' => 'required|unique:stok_barangs',
                'stok' => 'required',
                'harga' => 'required|number|min:1|max:100000000',
                'satuan' => 'required',
            ],
            [
                'nama_barang.required'    => 'Kolom nama barang tidak boleh kosong',
                'nama_barang.unique' => 'Barang sudah ada',
                'stok.required' => 'Kolom stok tidak boleh kosong',
                'harga.required' => 'Harga melampaui batas',
                'satuan.required'    => 'Kolom satuan tidak boleh kosong',
            ]);
        $stokbarang = new StokBarang;
        $stokbarang->nama_barang = $request->nama_barang;
        $stokbarang->stok = $request->stok;
        $stokbarang->satuan = $request->satuan;
        $stokbarang->harga = $request->harga_beli;
        $stokbarang->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('stokbarangs');
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
        $stokbarang = StokBarang::findOrFail($id);
        $stokbarang->nama_barang = $request->nama_barang;
        $stokbarang->stok = $request->stok;
        $stokbarang->satuan = $request->satuan;
        $stokbarang->harga = $request->harga_beli;
        $stokbarang->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('stokbarangs');

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
        $stokbarang=StokBarang::find($id);
        StokBarang::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('stokbarangs');
    }

     public function deleteAll()
    {
        DB::table('stokbarangs')->delete();
        return redirect('stokbarangs');
    }

}
