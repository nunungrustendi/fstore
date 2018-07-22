@extends('store.store_master')

@section('header')
@endsection

@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection

@section('content')
<hr>
	<div class="bg-secondary text-white p-2">
	<img width="24" height="24" src={{asset("/icon/troli_3_icon.svg")}}>&nbsp;Keranjang (Troli)
	</div>
	
	<div class="row mt-3 mb-2">
	
		<div class="col">
		<div class="mt-3 mb-2">DAFTAR BARANG DALAM KERANJANG: {{$product->count()}} item </div>
		<table class="table">
			<thead class="table-danger">
				<tr>
					<td class="font-weight-bold text-center">Hapus?</td>
					<td class="font-weight-bold text-center">No</td>
					<td class="font-weight-bold text-center">Id Produk</td>
					<td class="font-weight-bold text-center">Nama Produk</td>
					<td class="font-weight-bold text-center">Jumlah Item</td>
					<td class="font-weight-bold text-center">Harga per item (Rp)</td>
					<td class="font-weight-bold text-center">Jumlah (Rp)</td>
				</tr>
			</thead>
			<tbody>
				@foreach($product as $prod)
				<tr>
								
					<td class="text-center"><a href="#{{$prod->rowId}}" role="button" class="btn btn-outline-danger" data-toggle="modal"><img width="18" height="18" src={{asset("/icon/delete_icon.svg")}}></a></td>
					<!-- Modal --> 
						<div id="{{$prod->rowId}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-secondary">    
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>   
										<h5 id="myModalLabel">Konfirmasi</h5>  
									</div>  
									<div class="modal-body">    
										<p>Anda Yakin ingin menghapus produk {{$prod->name}} dari keranjang?</p>  
									</div>  
									<div class="modal-footer">    
										<button class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">Tidak</button>    
										<a class="btn btn-outline-danger" href="{{url('store/deletecartitem/'.$prod->rowId)}}" role="button">Ya</a>  
									</div> 
								</div>
							</div>
						</div> 	
					<td class="text-center">{{$loop->index+1}}</td>
					<td class="text-center">{{$prod->id}}</td>
					<td><a href="{{url('store/product/'.$prod->id)}}" style="color:gray" >{{$prod->name}}</a></td>
					<td class="text-center">{{$prod->qty}}</td>
					<td class="text-right">{{number_format($prod->price,2)}}</td>
					<td class="text-right">{{number_format($prod->subtotal,2)}}</td>
				<tr>
				@endforeach
				<tr>
					<td>TOTAL</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="font-weight-bold text-right">{{$total}}</td>
				<tr>
			</tbody>
		</table>

		</div>

		</div>	
	
	@if($product->count()>0)
		<a class="btn btn-outline-success" target="_blank" href="{{url('store/ordercart')}}" role="button"><img width="24" height="24" src={{asset("/icon/whatsapp_icon.svg")}}>Pesan/Order</a>
		<a href="#confirmModal" role="button" class="btn btn-outline-danger" data-toggle="modal"><img width="24" height="24" src={{asset("/icon/delete_icon.svg")}}>&nbsp;Kosongkan Keranjang</a>
		<!-- Modal --> 
			<div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">  
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-secondary">    
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>   
							<h5 id="myModalLabel">Konfirmasi</h5>  
						</div>  
						<div class="modal-body">    
							<p>Anda Yakin ingin mengosongkan Keranjang?</p>  
						</div>  
						<div class="modal-footer">    
							<button class="btn btn-outline-primary" data-dismiss="modal" aria-hidden="true">Tidak</button>    
							<a class="btn btn-outline-danger" href="{{url('/store/deletecart')}}" role="button">Ya</a>  
						</div> 
					</div>
				</div>
			</div> 
	@endif
	
	
	
	

@endsection





