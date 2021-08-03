@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0 text-dark">Inventory</h1> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Products </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        
                    <div class="card-body">
                        <div class="form-group row-center">
                        <form action="{{ route('product-update', $product->id_product) }}" method="post">
                            {{-- @include('inventory/validation')
                            @include('inventory/notification') --}}
                            <!-- <div class="form-group">
                                <label>SKU</label>
                                <input class="form-control" type="text" name="id_product">
                            </div> -->
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="nama_barang" value="{{ $product->nama_barang }}">
                            </div>
                            <div class="form-group">
                                <label>UoM</label>
                                <input class="form-control" type="text" name="uom" value="{{ $product->uom }}">
                            </div>
                           
                            <div class="form-group">
                                <label>Stok</label>
                                <input class="form-control" type="text" name="stok" value="{{ $product->stok }}">
                            </div>
                            <div class="form-group">
                                <label>Std Order</label>
                                <input class="form-control" type="text" name="std_order" value="{{ $product->std_order }}">
                            </div>
                            <center>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                                {{csrf_field()}}
                                <a href="{{ route('product-index') }}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                            </center>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
@endsection

@section('javascripts')
<!-- DataTables -->
<script src="{{url('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    $ ( function () {
        $('#datatable').DataTable();
    })
</script>

@endsection