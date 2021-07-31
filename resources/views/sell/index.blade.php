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
                        <form action="/sell" method="post">
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
                            <center>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
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
		                            <th>Nama Barang</th>
		                            <th>Vendor</th>
		                            <th>Jumlah</th>
		                            <th>Action</th>
	                        	</tr>
	                    	</thead>
	                    	<tbody>
	                    		<?php $no=1; $total=0; ?>
	                    		@foreach($sells as $sells)
	                        	<tr>
		                        	<td>{{ $no++ }}</td>
		                            <td>{{ $sells->nama_barang }}</td>
		                            <td>{{ $sells->kategori }}</td>
		                            <td>{{ $sells->qty }}</td>
		                            <td>		                            	             
                                    <a href="{{ route('sell-delete', $sells ->id_sell) }}" class="btn btn-danger">Delete</a>
                                    </td>
		                            
	                            @endforeach
	                        	</tr>
	                        	<!-- <tr>
	                        		<td colspan="6"><p align="right"><strong>Total</strong></p></td>
	                        		<td><strong>{{ $total }}</strong></td>
	                        	</tr> -->
	                    	</tbody>
	                	</table>
                        </br>
                        <div class="box-footer" style="padding:0 0 20px 20px">
                            <a href="{{ route('sell-update') }}" class="btn btn-success"><i class="glyphicon glyphicon-circle-arrow-right"></i>Simpan</a>
                                </br><br>
                            <i>Note: Barang Yang Sudah Disimpan Tidak Dapat Diubah</i>
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

<!-- Select2 -->
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
            url: "{{ route('sell-item') }}",
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