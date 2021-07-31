@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" style="background-color:Blue;"> </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group row-center">
                        <form action="/products" method="post">
                            <!-- <div class="form-group">
                                <label>SKU</label>
                                <input class="form-control" type="text" name="id_product">
                            </div> -->
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="nama_barang">
                            </div>
                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <select name="id_category" class="form-control" id="id_category">
                                <option value="10">Amai</option>
                                <option value="20">Bube</option>
                                <option value="30">Chirou</option>
                                <option value="40">Hello Wagyu</option>
                                <option value="50">Tousta</option>
                                <option value="60">Holdak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>UoM</label>
                                <input class="form-control" type="text" name="uom">
                            </div>
                            <!-- <div class="form-group">
                                <label>Harga Beli (Rp.)</label>
                                <input class="form-control" class="uang" type="text" name="harga_beli">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input class="form-control" type="text" name="harga_jual">
                            </div> -->
                            <div class="form-group">
                                <label>Stok</label>
                                <input class="form-control" type="text" name="stok">
                            </div>
                            <center>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Tambahkan">
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