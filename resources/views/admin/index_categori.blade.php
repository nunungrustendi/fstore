@extends('admin.admin_master')

@section('header')
	<h4 class="align text-right"> Admin Panel</h4>
	
@endsection


@section('content')
		
	<h5 class="h5 align text-centre">Tabel Kategori Produk</h5>
	<hr>
		<a href="{{url('admin/category/formshow')}}" class="btn btn-outline-primary"><span><img width="24" height="24" src={{asset("/icon/add_icon.svg")}}></span>Tambah Data</a>
	<hr>
	<table class="table table-hover table-striped">
	  <thead style="background-color:steelblue">
		<tr>
			<th class="text-center" style="width:5%">Nomor</th>
			<th class="text-center" style="width:5%">Gambar</th>
			<th class="text-center" style="width:20%">Kategori Produk</th>
			<th class="text-center" style="width:20%">Detail Kategori</th>
			<th class="text-center" style="width:20%">Action</th>
		</tr>
	  </thead>
	  <tbody>
			
		@foreach($categories as $cate)
				<tr>
					<td class="align-middle text-center">{{$loop->index+1}}</td>
					<td ><img src="{{asset('/storage/'.$cate->gambar)}}" class="img-fluid" alt="gbr1"></td>
					<td class="align-middle text-center">{{$cate->nama}}</td>
					<td class="align-middle text-center">{{$cate->detail}}</td>
					<td class="align-middle ">
						<a href="{{url('admin/category/update/'.$cate->id)}}"  class="btn btn-outline-primary btn-sm"><img width="24" height="24" src={{asset("/icon/edit_icon.svg")}}></a>		
						<a href="#{{$cate->id}}" role="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"><img width="24" height="24" src={{asset("/icon/delete_icon.svg")}}></a>	</td>
						<!-- Modal --> 
								<div id="{{$cate->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-secondary">    
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>   
												<h5 id="myModalLabel">Konfirmasi</h5>  
											</div>  
											<div class="modal-body">    
												<p>Anda yakin ingin menghapus Kategori {{$cate->nama}} dari Database?</p>  
											</div>  
											<div class="modal-footer">    
												<button class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">Tidak</button>    
												<a class="btn btn-outline-danger" href="{{url('admin/category/destroy/'.$cate->id)}}" role="button">Ya</a>  
											</div> 
										</div>
									</div>
								</div>
				</tr>
				
		@endforeach
		
	  </tbody>
	</table>

	
	
@endsection