<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purchase;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
class PurchaseController extends Controller
{
    public function index(){

		$purchases = Purchase::all();
		$purchases = DB::table('purchases')
						->join('products', 'purchases.id_product', '=', 'products.id_product')
						->join('categories', 'purchases.id_category', '=', 'categories.id_category')
						->select('purchases.*', 'products.*', 'categories.*')
						->where('status','=', '0')
						->get();
		$categories = Category::all();
    	$barang  = Product::all();
    	$data = array(
			'categories'  => $categories,
			'barang'   => $barang,
		);
  		return view('purchase/index', ['purchases'=>$purchases], $data);
	}

	public function item(Request $request)
    {
        if($request->has('id_category'))
        {
            if($request->id_category == 10){
                $data = DB::table('products')
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
		
		Purchase::create($request->all());
		return redirect('purchase');
	}

	public function delete($purchase)
    {
        Purchase::where('id_purchase', $purchase)->delete();
        return redirect('purchase');

    }
	
	public function update(){

		$purchases = Purchase::where('status', '0');
		$purchases->update(['status'=>'1']);
		return redirect('purchase')->with('pesan', 'Data dikirim ke laporan');
	}

}
