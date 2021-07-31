<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sell;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function index(){

		$sells = Sell::all();
		$sells = DB::table('sells')
						->join('products', 'sells.id_product', '=', 'products.id_product')
						->join('categories', 'sells.id_category', '=', 'categories.id_category')
						->select('sells.*', 'products.*', 'categories.*')
						->where('status','=', '0')
						->get();
		$categories = Category::all();
    	$barang  = Product::all();
    	$data = array(
			'categories'  => $categories,
			'barang'   => $barang,
		);
  		return view('sell/index', ['sells'=>$sells], $data);
	}

	public function item(Request $request)
    {
        if($request->has('id_category'))
        {
            if($request->id_category == 10){
                $data = $data = DB::table('products')
				->join('categories', 'products.id_category', '=', 'categories.id_category')
				->select(['products.*', 'categories.*'])
				->where('products.id_category','=', 10)
				->get();
                return response()->json($data);
            }else if($request->id_category == 20){
                $data = DB::table('products')
						->join('categories', 'products.id_category', '=', 'categories.id_category')
						->select(['products.*', 'categories.*'])
						->where('products.id_category','=', 20)
						->get();
                return response()->json($data);
            }else if($request->id_category == 30){
                $data = DB::table('products')
						->join('categories', 'products.id_category', '=', 'categories.id_category')
						->select(['products.*', 'categories.*'])
						->where('products.id_category','=', 30)
						->get();
                return response()->json($data);
            }else if($request->id_category == 40){
                $data = DB::table('products')
						->join('categories', 'products.id_category', '=', 'categories.id_category')
						->select(['products.*', 'categories.*'])
						->where('products.id_category','=', 40)
						->get();
                return response()->json($data);
            }else if($request->id_category == 50){
                $data = DB::table('products')
						->join('categories', 'products.id_category', '=', 'categories.id_category')
						->select(['products.*', 'categories.*'])
						->where('products.id_category','=', 50)
						->get();
                return response()->json($data);
            }else if($request->id_category == 60){
                $data = DB::table('products')
						->join('categories', 'products.id_category', '=', 'categories.id_category')
						->select(['products.*', 'categories.*'])
						->where('products.id_category','=', 60)
						->get();
                return response()->json($data);
            }else{
                echo "eror";
			}
        }

        return response()->json(null);

    }
    
    public function store(Request $request){
		
		
		$this->validate($request,[
            'id_category'   =>  'nullable|numeric|digits_between:0,10',
            'id_product'    =>  'required|string|max:255|min:0',
            'qty'    =>  'nullable|numeric|digits_between:0,10',
        ]);
		
        // dd($request->all());
		Sell::create($request->all());
		return redirect('sell');
	}

    public function delete($sell)
    {
        Sell::where('id_sell', $sell)->delete();
        return redirect('sell');

    }

    public function update(){

		$sells = Sell::where('status', '0');
		$sells->update(['status'=>'1']);
		return redirect('sell')->with('pesan', 'Data dikirim ke laporan');
	}

}
