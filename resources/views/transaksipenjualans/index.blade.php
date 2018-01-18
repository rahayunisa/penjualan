@extends('layouts.admin')
@section('content')
<center><h1> DATA TRANSAKSI PENJUALAN </h1></center>

	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA TRANSAKSI PENJUALAN</h3>

	<div class="panel-title pull-right">
	
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"> Tambah Data </i></button>
	
	@role('Administrator')	{{-- 
	<a href="deleteAll6" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> Delete All </i></a> --}}
	@endrole
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
		<div class="panel-body">
			<table class="table" id="example">
				<thead>
          <tr>
            <th>Id Jual</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>Tanggal Beli</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @php $no=1; @endphp
        @foreach($transaksipenjualan as $data)
        <tr class="accordion-toggle"  data-toggle="collapse" data-target="#collapseOne{{$data->id}}">
        <td>{{$no++}}</td>
        <td>{{$data->nama_customer}}
        <div id="collapseOne{{$data->id}}" class="collapse">
        @php
        $barangcustomers = DB::table('barangcustomers')->join('stok_barangs','stok_barangs.id','=','barangcustomers.id_stokbarang')->join('transaksipenjualans','transaksipenjualans.id','=','barangcustomers.id_transaksipenjualan')->where('barangcustomers.id_transaksipenjualan','=',$data->id)->get(); 
        @endphp
        @foreach ($barangcustomers as $barangcustomer) 
        <ol>
            <li> Nama Barang : {{$barangcustomer->nama_barang}} <br> </li>  
            <li> Harga Beli : {{$barangcustomer->harga_beli}} </li>
            <li> Banyak Barang : {{$barangcustomer->jumlah}} </li>
        </ol>
        @endforeach
        </td>
        <td>{{$data->alamat}}</td>
        <td>{{$data->tanggal_beli}}</td>

				@role('Administrator')
				<td>
				<div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-wrench"></i>  <span class="caret"></span></a>
                    
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                    <center><a class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$data->id}}"><i class="glyphicon glyphicon-edit"> Edit </i></a>
                   	<form action="{{route('transaksipenjualans.destroy',$data->id)}}" method="post" class ="delete"><br>
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
				        <h4 class="modal-title">Edit Transaksi Penjualan</h4>
			      	</div>

			    <form action="{{ route('transaksipenjualans.update',$data->id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			      
			<div class="box-body">
				 <div class="input-group">
            	<span class="input-group-addon"> Nama Customer </span>
				<input type="text" value="{{$data->nama_customer}}" name="nama_customer" class="form-control" required="">
			</div>
			<br>

			<div class="input-group">
            	<span class="input-group-addon"> Alamat </span>
				<textarea class="form-control" rows="10" name="alamat" required="">{{$data->alamat}}</textarea>
			</div>
			<br>

		    {{-- <div class="input-group">
				<span class="input-group-addon"> Harga Beli </span>
			<input type="text" value="{{$data->harga_beli}}" name="c" class="form-control" required="">
			<span class="input-group-addon">.00</span>
			</div>
			<br> --}}

			<div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
                <input type="date" name="d" value="{{$data->tanggal_beli}}" class="form-control" required="">
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
				        <h4 class="modal-title"> Tambah Transaksi Penjualan </h4>
			      	</div>
		      <form action="{{ route('transaksipenjualans.store') }}" method="post">
		      {{csrf_field()}}

			<div class="box-body">
				 <div class="input-group">
            	<span class="input-group-addon"> Nama Customer </span>
				<input type="text" name="nama_customer" class="form-control" required="">
			</div>
			<br>

			<div class="input-group">
            	<span class="input-group-addon"> Alamat </span>
				<textarea class="form-control" rows="10" name="alamat" required=""></textarea>
			</div>
			<br>

			{{-- <div class="input-group">
                <span class="input-group-addon"> Harga Beli </span>
                	<input type="text" name="c" class="form-control" required="">
                <span class="input-group-addon">.00</span>
            </div>
            <br> --}}

            <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
                <input type="date" name="d" class="form-control" required="">
            </div>
            <br>
			
			<div class="modal-footer">
			    <div class="form-group">
					<button type="submit" class="btn btn-danger">Submit</button>

					<button type="submit" class="btn btn-warning">Reset</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

						</div>
					</div>
				</form>			
			 </div>


	      
@endsection