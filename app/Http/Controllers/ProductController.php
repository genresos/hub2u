<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')
        ->ORDERBY('id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('products.*', 'categories.*')
        ->get();
        return view('product/index', compact('products'));
    }

	public function trace(){
		$aa = 1;
		$tgl = Carbon::now()->formatLocalized('%d %b %Y');
		$incoming = DB::table('purchases')
		->join('categories', 'purchases.id_category', '=', 'categories.id_category')
		->join('products', 'purchases.id_product', '=', 'products.id_product')
        ->where('purchases.status','=',$aa)
		->whereDate('purchases.date', '=', $tgl)
        ->get();

		$outcoming = DB::table('sells')
		->join('categories', 'sells.id_category', '=', 'categories.id_category')
		->join('products', 'sells.id_product', '=', 'products.id_product')
        ->where('sells.status','=',1)
		->whereDate('sells.date', '=', $tgl)
        ->get();
        
        return view('product/trace' , compact('incoming','outcoming','aa'));
	}

    public function create(){
        return view('product/create');
	}

	public function edit($id_product){
		$product = Product::where('id_product', $id_product)->first();

        if($id_product){
            return view('product.edit', compact('product'));
        }
	}
    
    public function store(Request $request){

		$this->validate($request, [
            'nama_barang' => 'required',
			'id_category' => 'required',
			'uom' => 'required',
            'stok'        => 'required',
        ]);
		if($request->id_category == 10){
			$lastId =  Product::where('id_category','=',10)
									  ->latest()->first()->id_product+11;
		}else if($request->id_category == 20){
			$lastId =  Product::where('id_category','=',20)
									  ->latest()->first()->id_product+11;
		}else if($request->id_category == 30){
			$lastId =  Product::where('id_category','=',30)
									  ->latest()->first()->id_product+11;
		}else if($request->id_category == 40){
			$lastId =  Product::where('id_category','=',40)
									  ->latest()->first()->id_product+11;
		}else if($request->id_category == 50){
			$lastId =  Product::where('id_category','=',50)
									  ->latest()->first()->id_product+11;
		}else if($request->id_category == 60){
			$lastId =  Product::where('id_category','=',60)
									  ->latest()->first()->id_product+11;
		}

		Product::create([
			'id_product'  => $lastId,
			'nama_barang' => request('nama_barang'),
			'id_category' => request('id_category'),
			'uom' => request('uom'),
			'stok'        => request('stok'),
			'std_order'        => request('std_order'),
		]);

		return redirect('products')->with('Data berhasil ditambahkan');
	}

	public function update(Request $request, $id_product)
    {
        $product = Product::where('id_product', $id_product)->first();

        if($product)
        {
            $product->update($request->only('nama_barang', 'uom', 'stok', 'std_order'));

			return redirect('products')->with('Data berhasil ditambahkan');
        }
        abort(403);
    }

	public function delete($products)
    {
        Product::where('id_product', $products)->delete();
        return redirect()->route('product-index');

    }
}
