<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBarang;
use Alert;

class KategoriBarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategoribarang = KategoriBarang::all();
        return view ('kategoribarangs.index',compact('kategoribarang'));
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
        $kategoribarang = new KategoriBarang;
        $kategoribarang->satuan = $request->a;
        $kategoribarang->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('kategoribarangs');
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
        $kategoribarang = KategoriBarang::findOrFail($id);
        $kategoribarang->satuan = $request->a;
        $kategoribarang->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('kategoribarangs');

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
        $kategoribarang=KategoriBarang::find($id);
        KategoriBarang::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('kategoribarangs');
    }
}
