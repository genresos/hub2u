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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <br>   
                        <div class="card-header">
                            <a href="{{ route ('product-create')}}"> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</button></a>&ensp;
                            <a href="{{ route ('product-trace')}}"> <button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-plus"></i> Trace Barang</button></a>
                        </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap" id="datatable">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> SKU </th>
                                    <th> Nama Barang </th>
                                    <th> Vendor </th>
                                    <th> Satuan </th>
                                    <th> Std Order </th>
                                    <th> Stok </th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->id_product }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kategori }}</td>
                                        <td>{{ $barang->uom }}</td>
                                        <td>{{ $barang->std_order }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td>
                                            <a href="{{ route('product-edit', $barang ->id_product) }}" class="btn btn-block btn-info btn-xs">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('product-delete', $barang ->id_product) }}" class="btn btn-block btn-danger btn-xs">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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