<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use KategoriBarang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoribarang = KategoriBarang::all();
        return view('home', compact('kategoribarang'));
    }
}
