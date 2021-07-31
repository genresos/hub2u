@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                            <form action="/outcoming"name="laporan" method="GET" >
                                <center><h4> Bukti Pengeluaran Barang Gudang </h4> </br> </center>
                                No. Permintaan :
                                <input class="form-control" type="text" name="no_permintaan" value="0000" >
                                </br>
                                <div class="form-group">
                                    <label>Vendor</label>
                                    <select name="id_category" class="form-control" id="id_category">
                                    <option value="" selected hidden>-- Pilih Brand --</option>
                                    <option value="10">Amai</option>
                                    <option value="20">Bube</option>
                                    <option value="30">Chirou</option>
                                    <option value="40">Hello Wagyu</option>
                                    <option value="50">Tousta</option>
                                    <option value="60">Holdak</option>
                                    </select>
                                </div>
                                </br>
                                </br>
                                Tanggal : &ensp;
                                <input type="date" name="actual_date" value="<?php echo date('Y-m-d'); ?>" />
                                <center><button class="btn btn-primary" name="submit" type="submit">Cetak Laporan</button></center>
                            </form>
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
        $('#datatable').DataTable();
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
      $('.id_product').select2();
    });
  
    $('#id_category').on('change', function() {
        var selected = $(this).find(":selected").val();
        $.ajax({
            type: 'get',
            data: {'id_category': selected},
            url: "{{ route('laporan-item') }}",
            dataType: 'json',
            success: function(data){
                var id_product = $('#id_product').empty();
                $.each(data, function(i, data){
                    $('<option/>', {
                        value:data.id_product,
                        text:data.nama_barang
                    }).appendTo(id_product);
                })
               console.log(data);
            },
            error: function(res){
                $('#message').text('Error!');
                $('.dvLoading').hide();
            }
        });
    });
</script>

@endsection