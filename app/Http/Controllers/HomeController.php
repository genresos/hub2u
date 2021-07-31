<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

// use App\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $aa = 10;
        $amai = DB::table('products')
        ->where('products.id_category','=',$aa)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();

        $bube = DB::table('products')
        ->where('products.id_category','=',20)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();

        $chirou = DB::table('products')
        ->where('products.id_category','=',30)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();

        $wagyu = DB::table('products')
        ->where('products.id_category','=',40)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();

        $tousta = DB::table('products')
        ->where('products.id_category','=',50)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();

        $holdak = DB::table('products')
        ->where('products.id_category','=',60)
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();
        
        return view('home' , compact('amai','bube','chirou','wagyu','tousta','holdak'));
    }
}
