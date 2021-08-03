<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Sell;
use App\Purchase;
use App\Category;
use App\Product;
use App\Budgeting;
use Fpdf;

class BudgetingController extends Controller
{
    public function index(){
        $budgetings = DB::table('budgetings')
        ->join('products', 'budgetings.id_product', '=', 'products.id_product')
        ->join('categories', 'products.id_category', '=', 'categories.id_category')
        ->select('budgetings.*', 'products.*','categories.*')
        ->where('status','=', '0')
        ->get();
        return view('maintance', ['budgetings'=>$budgetings]);
    }

    public function store(Request $request){
    $item = Product::where('id_product', $request->id_product)->latest()->first()->stok;
    $data = array(
                'id_product'    =>  $request->id_product,
                'id_category'    =>  $request->id_category,
                'qty'    =>  $request->qty,
                'jenis_laporan'  => $request->jenis_laporan,
                'remark'   => $request->remark,
                'act_stok'   => $item,
            );
    Budgeting::create($data);
    return redirect('budgeting');

    }
    public function item(Request $request){
        if($request->has('id_product')){
            $data = DB::table('products')
            ->select(['products.stok'])
            ->where('products.id_product','=', 10001)
            ->get();
                        return response()->json($data);
        }
    }
    public function print(){

        $tgl = Carbon::now()->formatLocalized('%d %b %Y');
        $data = DB::table('budgetings')
						->join('products', 'budgetings.id_product', '=', 'products.id_product')
						->join('categories', 'budgetings.id_category', '=', 'categories.id_category')
						->select('budgetings.*', 'products.*', 'categories.*')
						->where('status','=', '0')
						->get();

        $title = Budgeting::where('status','=',0)
                            ->latest()->first()->jenis_laporan;
        if($title == 1){
              $title = "FORM PERMINTAAN REGULER BAHAN BAKU PASAR MINGGUAN";
        }else if($title == 2){
            $title = "FORM PERMINTAAN REGULER BAHAN BAKU MINGGUAN";
        }

        $brand = Budgeting::where('status','=',0)
                            ->latest()->first()->id_category;
        
        if($brand == 10){
			$brand ='AMAI';
		}else if($brand == 20){
			$brand ='BUBE';
		}else if($brand == 30){
			$brand ='CHIROU';
		}else if($brand == 40){
			$brand ='HELLO WAGYU';
		}else if($brand == 50){
			$brand ='TOUSTA';
		}else if($brand == 60){
			$brand ='HOLDAK';
		}


        //======================================================================
        $logo = asset('AdminLTE/dist/img/cute.jpg');
        $pdf = new Fpdf("P","mm","A4");
        $pdf::AddPage("P");
        $pdf::Image('logo/hw.jpg',10,6,20);
        $pdf::SetFont('Arial', 'BU', 8);
        $pdf::Cell(200,3,$title,0,1,'C');
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', 'B', 6);
        $pdf::Cell(25,3,'NO. DOC',0,0,'L');
        $pdf::Cell(5,3,':',0,0,'C');
        $pdf::Cell(1,3,'',0,0);
        $pdf::Cell(2,3,'',0,0);
        $pdf::Cell(65,3,'0001',0,1);

        $pdf::SetFont('Arial', 'B', 6);
        $pdf::Cell(25,3,'BRAND',0,0,'L');
        $pdf::Cell(5,3,':',0,0,'C');
        $pdf::Cell(1,3,'',0,0);
        $pdf::Cell(2,3,'',0,0);
        $pdf::Cell(65,3,'HELLO WAGYU',0,1);
        
        $pdf::SetFont('Arial', 'B', 6);
        $pdf::Cell(25,3,'TANGGAL',0,0,'L');
        $pdf::Cell(5,3,':',0,0,'C');
        $pdf::Cell(1,3,'',0,0);
        $pdf::Cell(2,3,'',0,0);
        $pdf::Cell(65,3,$tgl,0,1);


        $pdf::SetFont('Arial', 'B', 6);
        $pdf::Cell(85,3,'',0,0,'L');
        $pdf::Cell(40,3,'Divisi Gudang',0,0,'L');
        $pdf::Cell(90,3,'Divisi Finance',0,1,'L');

        $pdf::SetFont('Times', 'B', 6);
        $pdf::Cell(8,3,'No',1,0,'C');
        //======================================= judul
        $pdf::Cell(45,3,'Nama Barang',1,0,'C');
        $pdf::Cell(20,3,'Standar Order',1,0,'C');
        $pdf::Cell(20,3,'Permintaan Bahan',1,0,'C');
		$pdf::Cell(20,3,'Sisa Stok',1,0,'C');
        $pdf::Cell(20,3,'Pengurangan',1,0,'C');
        $pdf::Cell(20,3,'Penambahan',1,0,'C');
        $pdf::Cell(30,3,'Keterangan',1,1,'C');
        //======================================= kolom tengah
        $pdf::SetFont('Times', '', 6);
        $pdf::Cell(8,3,'',1,0,'C');
        $pdf::Cell(45,3,'',1,0,'C');
        $pdf::Cell(10,3,'Qty',1,0,'C');
        $pdf::Cell(10,3,'Satuan',1,0,'C');
        $pdf::Cell(10,3,'Qty',1,0,'C');
        $pdf::Cell(10,3,'Satuan',1,0,'C');
		$pdf::Cell(10,3,'Qty',1,0,'C');
        $pdf::Cell(10,3,'Satuan',1,0,'C');
        $pdf::Cell(10,3,'Qty',1,0,'C');
        $pdf::Cell(10,3,'Satuan',1,0,'C');
        $pdf::Cell(10,3,'Qty',1,0,'C');
        $pdf::Cell(10,3,'Satuan',1,0,'C');
        $pdf::Cell(30,3,'',1,1,'C');
       
        //====================================== isi data
  
        $pdf::Cell(8,3,'1',1,0,'C');
        $pdf::Cell(45,3,'Telur Ayam',1,0,'L');
        $pdf::Cell(10,3,'102',1,0,'C');
        $pdf::Cell(10,3,'Kg',1,0,'C');
        $pdf::Cell(10,3,'55',1,0,'C');
        $pdf::Cell(10,3,'Kg',1,0,'C');
		$pdf::Cell(10,3,'55',1,0,'C');
        $pdf::Cell(10,3,'Kg',1,0,'C');
        $pdf::Cell(10,3,'55',1,0,'C');
        $pdf::Cell(10,3,'Kg',1,0,'C');
        $pdf::Cell(10,3,'55',1,0,'C');
        $pdf::Cell(10,3,'Kg',1,0,'C');
        $pdf::Cell(30,3,'Tidak ada',1,1,'L');

     //====================================== signature
        $pdf::SetFont('Arial', 'BU', 16);
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', '', 6);
        $pdf::Cell(25,3,'Dibuat oleh',0,0,'C');
        $pdf::Cell(70,3,'Di isi Oleh',0,0,'C');
        $pdf::Cell(40,3,'Menyetujui',0,0,'C');
        $pdf::Cell(60,3,'Mengetahui',0,1,'C');
        $pdf::SetFont('Arial', 'BU', 16);
        $pdf::Cell(30,15,'',0,1);
        $pdf::SetFont('Arial', 'B', 6);
        $pdf::Cell(25,3,'Divisi Gudang',0,0,'C');
        $pdf::Cell(70,3,'Dept. FA',0,0,'C');
        $pdf::Cell(20,3,'Dept. Purchasing',0,0,'C');
        $pdf::Cell(5,3,'',0,0,'C');
        $pdf::Cell(20,3,'Dept. Purchasing',0,0,'C');
        $pdf::Cell(50,3,'BOD',0,1,'C');
        $pdf::Output();
		exit;

        // dd($tgl);
    }
}



