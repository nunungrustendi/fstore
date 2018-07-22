@extends('admin.admin_master')

@section('header')
	<h4 class="align text-right"> Admin Panel</h4>
@endsection

@section('content')
		<h5>Tabel Produk</h5>
	
		<hr>
		<a href="{{url('admin/product/formshow')}}" class="btn btn-outline-primary"><img width="24" height="24" src="/icon/add_icon.svg">Tambah Data</a>
		<hr>
		<table class="table table-hover table-striped">
		  <thead style="background-color:steelblue">
			<tr>
				<th class="text-center" style="width:5%">Nomor</th>
				<th class="text-center" style="width:5%">Gambar</th>
				<th class="text-center" style="width:20%">Nama Produk</th>
				<th class="text-center" style="width:20%">Kategori</th>
				<th class="text-center" style="width:30%">Merk</th>
				<th class="text-center" style="width:20%">Action</th>
			</tr>
		  </thead>
		  <tbody>
				
			@foreach($product as $prod)
				<tr>
					<td class="align-middle text-center">{{$loop->index+1}}</td>
					<td class="align-middle"><img src="{{asset('/storage/'.$prod->gambar1)}}" class="img-fluid" style="max-height:28px;max-width:28px"alt="gbr1"></td>
					<td class="align-middle">{{$prod->nama}}</td>
					@if($prod->kategori)
						<td class="align-middle text-center">{{$prod->kategori->nama}}</td>
					@else
						<td>-</td>
					@endif
					@if($prod->merk)
						<td class="align-middle text-center">{{$prod->merk->nama}}</td>
					@else
						<td class="align-middle text-center">-</td>
					@endif
					<td class="align-middle">
						<a href="{{url('admin/product/update/'.$prod->id)}}"  class="btn btn-outline-primary btn-sm"><img width="24" height="24" src="/icon/edit_icon.svg"></a>		
						<a href="#{{$prod->id}}" role="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"><img width="24" height="24" src="/icon/delete_icon.svg"></a>	</td>
						<!-- Modal --> 
								<div id="{{$prod->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-secondary">    
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>   
												<h5 id="myModalLabel">Konfirmasi</h5>  
											</div>  
											<div class="modal-body">    
												<p>Anda yakin ingin menghapus produk {{$prod->nama}} dari Database?</p>  
											</div>  
											<div class="modal-footer">    
												<button class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">Tidak</button>    
												<a class="btn btn-outline-danger" href="{{url('admin/product/destroy/'.$prod->id)}}" role="button">Ya</a>  
											</div> 
										</div>
									</div>
								</div>
				</tr>
			@endforeach
			
		  </tbody>
		</table>
		<hr>
				<div class="d-flex justify-content-center">{{$product->links()}}</div>
		<hr>
		
	
@endsection