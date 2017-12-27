<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Alert;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customer::all();
        return view ('customers.index',compact('customer'));
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
        $customer = new Customer;
        $customer->nama_customer = $request->a;
        $customer->alamat = $request->b;
        $customer->no_telp = $request->c;
        $customer->save();
        Alert::success('Tambah Data','Berhasil')->autoclose(1500);
        return redirect('customers');
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
        $customer = Customer::findOrFail($id);
        $customer->nama_customer = $request->a;
        $customer->alamat = $request->b;
        $customer->no_telp = $request->c;
        $customer->save();
        Alert::success('Edit Data','Berhasil')->autoclose(1500);
        return redirect('customers');

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
        $customer=Customer::find($id);
        Customer::find($id)->delete();
        Alert::success('User deleted successfully')->autoclose(1500);
        return redirect('customers');
    }
}
