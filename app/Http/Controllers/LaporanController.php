<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Fpdf;
use App\Category;
use App\Product;
use App\Sell;
class LaporanController extends Controller
{

    public function index(){
        return view('laporan/index');
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
    public function outcoming(Request $request){
		$kode = $request->id_category;
        if($request->id_category == 10){
			$kode ='A-';
		}else if($request->id_category == 20){
			$kode ='B-';
		}else if($request->id_category == 30){
			$kode ='C-';
		}else if($request->id_category == 40){
			$kode ='H-';
		}else if($request->id_category == 50){
			$kode ='T-';
		}else if($request->id_category == 60){
			$kode ='H-';
		}
        $tgl = Carbon::now()->formatLocalized('%d %b %Y');
        $no_bukti = $request->no_permintaan;

        $cat = $request->id_category;
        if($request->id_category == 10){
			$cat ='Amai';
		}else if($request->id_category == 20){
			$cat ='Bube';
		}else if($request->id_category == 30){
			$cat ='Chirou';
		}else if($request->id_category == 40){
			$cat ='Hello Wagyu';
		}else if($request->id_category == 50){
			$cat ='Tousta';
		}else if($request->id_category == 60){
			$cat ='Holdak';
		}
        $pdf = new Fpdf("P","cm","A4");
        $pdf::AddPage("P");
        $pdf::SetFont('Arial', 'BU', 16);
        $pdf::Cell(185,7,'BUKTI PENGELUARAN BARANG GUDANG',0,1,'C');
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', 'B', 14);
        $pdf::Cell(25,7,'NO. BUKTI',0,0,'C');
        $pdf::Cell(5,7,':',0,0,'C');
        $pdf::Cell(1,7,'',0,0);
        $pdf::Cell(6,7,$kode,0,0);
        $pdf::Cell(2,7,$no_bukti,0,0);
        $pdf::Cell(50,7,'',0,0);
        $pdf::Cell(30,7,'TANGGAL',0,0,'C');
        $pdf::Cell(38,7,':',0,0,'C');
        $pdf::Cell(1,7,'',0,0);
        $pdf::Cell(10,7,$tgl,0,1,'C');

        $pdf::SetFont('Arial', 'B', 14);
        $pdf::Cell(25,7,'BRAND     ',0,0,'C');
        $pdf::Cell(5,7,':',0,0,'C');
        $pdf::Cell(1,7,'',0,0);
        $pdf::Cell(2,7,$cat,0,0);
        $pdf::Cell(65,7,'',0,0);
        $pdf::Cell(30,7,'NO PERMINTAAN',0,0,'C');
        $pdf::Cell(20,7,':',0,0,'C');
        $pdf::Cell(1,7,'',0,0);
        $pdf::Cell(13,7,$no_bukti,0,1,'C');   

        $pdf::SetFont('Times', 'B', 12);
       
        $pdf::Cell(30,10,'',0,1);
        $pdf::Cell(15,7,'No',1,0,'C');
        $pdf::Cell(70,7,'Nama Barang',1,0,'C');
        $pdf::Cell(25,7,'Jumlah',1,0,'C');
		$pdf::Cell(25,7,'Satuan',1,0,'C');
        $pdf::Cell(60,7,'Keterangan',1,1,'C');
        
        $kat = $request->id_category;
	
		$sells = DB::table('sells')
						->join('products', 'sells.id_product', '=', 'products.id_product')
						->join('categories', 'sells.id_category', '=', 'categories.id_category')
						->select('sells.*', 'products.*', 'categories.*')
                        ->where('status','=', '1')
                        ->where('sells.id_category','=',$kat)
						->whereDate('date', '=', $request->actual_date)
						->get();
     	$categories = Category::all();
    	$products  = Product::all();
  
        $no=1;
        foreach($sells as $sells){
            $barang = substr ($sells->nama_barang,0,20);
            $pdf::SetFont('Arial', '', 12);
            $pdf::Cell(15,7,$no++,1,0,'C');
            $pdf::Cell(70,7,$barang,1,0);
            $pdf::Cell(25,7,$sells->qty,1,0,'C');
			$pdf::Cell(25,7,$sells->uom,1,0,'C');
            $pdf::Cell(60,7,'',1,1);
       	}
        $pdf::SetFont('Arial', 'BU', 16);
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(25,7,'Dibuat oleh,',0,0,'C');
        $pdf::Cell(280,7,'Menerima',0,1,'C');

        $pdf::SetFont('Arial', 'BU', 16);
        $pdf::Cell(30,10,'',0,1);
        $pdf::Cell(30,10,'',0,1);
        
        $pdf::SetFont('Arial', 'B', 12);
        $pdf::Cell(30,7,'Divisi Gudang',0,0,'C');
        $pdf::Cell(279,7,'Divisi Kitchen',0,1,'C');

        $filename = $request->id_category;
        if($request->id_category == 10){
			$filename ="Laporan Amai-$no_bukti.pdf";
		}else if($request->id_category == 20){
			$filename ="Laporan Bube-$no_bukti.pdf";
		}else if($request->id_category == 30){
			$filename ="Laporan Chirou-$no_bukti.pdf";
		}else if($request->id_category == 40){
			$filename ="Laporan HW-$no_bukti.pdf";
		}else if($request->id_category == 50){
			$filename ="Laporan Tousta-$no_bukti.pdf";
		}else if($request->id_category == 60){
			$filename ="Laporan Holdak-$no_bukti.pdf";
		}

        $pdf::Output($filename,'D');
		exit;
    
    }
}
