<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Alert;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = Supplier::all();
        return view ('suppliers.index',compact('supplier'));
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
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->a;
        $supplier->alamat = $request->b;
        $supplier->no_telp = $request->c;
        $supplier->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('suppliers');
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
        $supplier = Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->a;
        $supplier->alamat = $request->b;
        $supplier->no_telp = $request->c;
        $supplier->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('suppliers');
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
        $supplier=Supplier::find($id);
        Supplier::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('suppliers');
    }
}
