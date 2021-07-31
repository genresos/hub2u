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
                    <strong>HOLDAK</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_holdak">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holdak as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
                    <strong>BUBE</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_bube">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bube as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
    <div class="container-fluid">
        <div class="row g-0">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                    <center>
                    <strong>TOUSTA</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_tousta">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tousta as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
                    <strong>HELLO WAGYU</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_wagyu">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wagyu as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
    <div class="container-fluid">
        <div class="row g-0">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                    <center>
                    <strong>AMAI</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_amai">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amai as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
                    <strong>CHIROU</strong></br></br>
                    </center>
                    <table class="table table-sm text-nowrap" id="datatable_chirou">
                                <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Nama Barang </th>
                                    <th> Stok </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chirou as $key => $barang)
                                    <?php $no=1;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->stok }}</td>
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
