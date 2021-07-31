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
                        <form action="/budgeting" method="post">
                            <center><h4>FORM PERMINTAAN MINGGUAN</h4></center>
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="jenis_laporan" class="form-control" id="jenis_laporan">
                                <option value="" selected hidden>-- Pilih Jenis --</option>
                                <option value="1">Pasar Mingguan</option>
                                <option value="2">Vendor Mingguan</option>
                                </select>
                            </div>
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
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <select name="id_product" class="form-control id_product" id="id_product">
                                    <option value="" selected hidden>-- Pilih Item --</option>            
                                </select>
                            </div>
                             <div class="form-group">
			                <label for="qty">Jumlah</label>
			                <input class="form-control" placeholder="Masukkan jumlah barang" name="qty" type="decimal" required>
			                 </div>
                             <div class="form-group">
			                <label for="qty">Remark</label>
			                <input class="form-control" placeholder="Remark" name="remark" type="string">
			                 </div>
                            <center>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success">Tambah</button>
                                {{csrf_field()}}
                            </div>
                            </center>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
	                    <table class="table table-sm text-nowrap" id="datatable">
	                        <thead>
	                        	<tr>
		                        	<th>No.</th>
                                    <th>Brand.</th>
		                            <th>Nama Barang </br> APA</th>
		                            <th>Qty Order</th>
                                    <th>Sisa Stok</th>
                                    <th>Remark</th>
		                            <th>Action</th>
	                        	</tr>
	                    	</thead>
	                    	<tbody>
	                    		<?php $no=1; $total=0; ?>
	                    		@foreach($budgetings as $item)
                                <tr>
		                        	<td>{{ $no++ }}</td>
                                    <td>{{ $item->kategori }}</td>
		                            <td>{{ $item->nama_barang }}</td>
		                            <td>{{ $item->qty }}</td>
		                            <td>{{ $item->act_stok }}</td>
                                    <td>{{ $item->remark }}</td>
		                            <td>		                            	             
                                    <a href="{{ route('purchase-delete', $item ->id_budget) }}" class="btn btn-danger">Delete</a>
                                    </td>
		                            
	                            @endforeach
	                        	</tr>
	                    	</tbody>
	                	</table>
                        </br>
                        <div class="box-footer" style="padding:0 0 20px 20px">
                            <a href="{{ route('product-index') }}" class="btn btn-success"><i class="fa fa-save"></i> Simpan</a>
                            <a href="{{ route('budgeting-print') }}" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                                </br><br>
                            <strong><i>Note:</i></br></strong>
                            <i>Barang Yang Sudah Disimpan Tidak Dapat Dicetak Kembali</i></br>
                            <i>Pastikan Permintaan Yang Ingin Dicetak Sudah Benar</i>
                        </div>
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
<script> // For Get ID Product
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