@extends('layouts.admin')
@section('content')

	<center><h1> DATA BARANG CUSTOMER </h1></center>

	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA BARANG CUSTOMER</h3>

	<div class="panel-title pull-right">
	
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"> Tambah Data </i></button>

	@role('Administrator')
	<button type="button" class="btn btn-danger" id="delete-btn"><i class="glyphicon glyphicon-trash"> Delete All </i></a>
	@endrole
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
		<div class="panel-body">
			<table class="table" id="example">
				<thead>
					<tr>
						<th>No</th>
						<th>Id Customer</th>
						<th>Id Transaksi Penjualan</th>
						<th>Nama Barang</th>
						<th>Harga Jual</th>
						<th>Harga Beli</th>
						<th>Stok</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@php $no=1; @endphp
				@foreach($barangcustomer as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->customers->id}}</td>
				<td>{{$data->transaksipenjualans->id}}</td>
				<td>{{$data->nama_barang}}</td>
				<td>{{$data->harga_jual}}</td>
				<td>{{$data->harga_beli}}</td>
				<td>{{$data->stok}}</td>
				
				@role('Administrator')
				<td>
				<div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i>  <span class="caret"></span></a>
                    
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <center><a class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$data->id}}"><i class="glyphicon glyphicon-edit"> Edit </i></a>
                   	<form action="{{route('barangcustomers.destroy',$data->id)}}" method="post" class ="delete"><br>
                   <input name="_method" type="hidden" value="DELETE">
				<input name="_token" type="hidden" >
				{{csrf_field()}}
				<button type="submit" class="btn btn-danger" id="delete-btn"><i class="glyphicon glyphicon-trash"> Delete </i></button>

				 </ul>
                </li>
				
				</form>
			
				</td>
				@endrole

			
			<!-- Modal -->
			<div id="myModal{{$data->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">

			    <!-- Modal content-->
		    <div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit Barang Customer</h4>
		      	</div>

			    <form action="{{ route('barangcustomers.update',$data->id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			      
			<div class="box-body">

			<div class="input-group">
				<span class="input-group-addon"> Id Transaksi Penjualan </span>
					<select class="form-control" name="id_transaksipenjualan">
						@foreach($transaksipenjualan as $dd)
						<option value="{{$dd->id}}">{{$dd->id}}
						</option>
						@endforeach
					</select>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Id Customer </span>
					<select class="form-control" name="id_customer">
						@foreach($customer as $dd)
						<option value="{{$dd->id}}">{{$dd->id}}
						</option>
						@endforeach
					</select>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Nama Barang </span>
				<input type="text" value="{{$data->nama_barang}}" name="nama_barang" class="form-control" required="">
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Harga Jual </span>
				<input type="text" value="{{$data->harga_jual}}" name="harga_jual" class="form-control" required="">
				<span class="input-group-addon">.00</span>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Harga Beli </span>
				<input type="text" value="{{$data->harga_beli}}" name="harga_beli" class="form-control" required="">
				<span class="input-group-addon">.00</span>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Stok </span>
				<input type="text" value="{{$data->stok}}" name="stok" class="form-control" required="">
			</div>
			<br>
			      
			</div>
			      <div class="modal-footer">
			        <div class="form-group">
				<button type="submit" class="btn btn-danger">Submit</button>

				<button type="submit" class="btn btn-warning">Reset</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
			      </div>



			    </div>

			  </div>
			@endforeach
				</tbody>
			</table>			

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"> Tambah Barang Customer </h4>
			      </div>
			      <form action="{{ route('barangcustomers.store') }}" method="post">
			      {{csrf_field()}}


			<div class="box-body">

			<div class="input-group">
				<span class="input-group-addon"> Id Transaksi Penjualan </span>
					<select class="form-control" name="id_transaksipenjualan">
						@foreach($transaksipenjualan as $dd)
						<option value="{{$dd->id}}">{{$dd->id}}
						</option>
						@endforeach
					</select>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Id Customer </span>
					<select class="form-control" name="id_customer">
						@foreach($customer as $dd)
						<option value="{{$dd->id}}">{{$dd->id}}
						</option>
						@endforeach
					</select>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Nama Barang </span>
				<input type="text" name="nama_barang" class="form-control" required="">
			</div>
			<br>
			
			<div class="input-group">
				<span class="input-group-addon"> Harga Jual </span>
				<input type="text" name="harga_jual" class="form-control" required="">
				<span class="input-group-addon">.00</span>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Harga Beli </span>
				<input type="text" name="harga_beli" class="form-control" required="">
				<span class="input-group-addon">.00</span>
			</div>
			<br>

			<div class="input-group">
				<span class="input-group-addon"> Stok </span>
				<input type="text" name="stok" class="form-control" required="">
			</div>
			<br>

			</div>

		    <div class="modal-footer">
		        <div class="form-group">
					<button type="submit" class="btn btn-danger">Submit</button>

					<button type="submit" class="btn btn-warning">Reset</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>			
		    </div>
				</form>


	      
@endsection