@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
        </br>
    <div class="container-fluid">
        <div class="row g-0">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                    <center>
                    <strong>Incoming Item Today</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_holdak">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Vendor </th>
                                    <th> Qty </th>
                                    <th> Satuan </th>
                                    <th> Date </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incoming as $key => $item)
                                    <?php
                                    $no=1;
                                    $date = \Carbon\Carbon::parse($item->date)->formatLocalized('%d %b %Y')
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->uom }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                    <center>
                    <strong>Outcoming Item Today</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_bube">
                    <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Vendor </th>
                                    <th> Qty </th>
                                    <th> Satuan </th>
                                    <th> Date </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($outcoming as $key => $item)
                                    <?php $no=1;
                                    $date = \Carbon\Carbon::parse($item->date)->formatLocalized('%d %b %Y')
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->uom }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $date }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                     </div>
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
        $('#datatable_amai').DataTable();
        $('#datatable_bube').DataTable();
        $('#datatable_chirou').DataTable();
        $('#datatable_wagyu').DataTable();
        $('#datatable_tousta').DataTable();
        $('#datatable_holdak').DataTable();
    })
</script>

@endsection
