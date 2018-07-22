@extends('store.store_master')

@section('header')

	@include('store.store_sub_slide',['gbr'=>$gbr])
	
@endsection

@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection

@section('content')
	<hr>
	<div class="row">
		
		<div class="col-3  d-none d-md-block">
				<!---------------------------------------MENU SAMPING KATEGORI-->
				<ul class="list-group list-group-flush">
					<li class="list-group-item text-center h6 text-secondary" style="background-color:pink">KATEGORI PRODUK<<<</li>
					<li class="list-group-item pb-1" style="background-color:lavenderblush"><a href="{{url('store/home/')}}" style="color:gray">SEMUA PRODUK</a></li>
					@foreach($categories as $cate)
						<li class="list-group-item pb-1" style="background-color:lavenderblush"><a href="{{url('store/category/'.$cate->id)}}" style="color:gray"> {{$cate->nama}}</a></li>
					@endforeach
				</ul>
				<!---------------------------------------------------------------->
				
				<!---------------------------------------MENU SAMPING MERK-->
				<ul class="list-group list-group-flush">
					<li class="list-group-item text-center h6 text-secondary" style="background-color:pink">MERK PRODUK<<<</li>
					@foreach($merk as $mr)
						<li class="list-group-item pb-1" style="background-color:lavenderblush"><a href="{{url('store/merk/'.$mr->id)}}" style="color:gray"> {{$mr->nama}}</a></li>
					@endforeach
				</ul>
				<!---------------------------------------------------------------->			

				
		</div>
		
		
		
		<div class="col">
		
			<div class="bg-secondary text-white p-2">
				Kategori : {{$caption}}
			</div>
					
					<div class="row">
						@foreach($product as $prod)
							<div class="col-sm-4 col-md-3">
								<a href="{{url('store/product/'.$prod->id)}}">
								<div class="card mb-2 mt-2" style="width:100%">
									<img class="card-img-top img-fluid border rounded-0" src="{{asset('/storage/'.$prod->gambar1)}}" alt="Card image cap">
										<div class="card-body mt-0 mb-1 pb-1  pt-0">
											<p class="card-text mt-0 mb-0 pt-0 text-secondary text-capitalize text-center">{{$prod->nama}}</p>
											<div class="card-text text-center mt-0 mb-0 pt-0 text-warning text-weight-bold h6">Rp. {{number_format($prod->harga_aktual)}}   </div>	
											<span class="card-text mt-0 mb-0 pt-0 text-secondary"><small><del>Rp. {{number_format($prod->harga_dasar)}}</del></small></span>
											@if($prod->harga_aktual<$prod->harga_dasar)
													<span class="badge badge-primary shadow">{{number_format((($prod->harga_dasar-$prod->harga_aktual)/$prod->harga_dasar)*100,0)}}%</span>
											@endif
										</div>
								</div>
								</a>
							</div>
						@endforeach
					</div>
					<hr>
					<div class="d-flex justify-content-center">{{$product->links()}}</div>
					<hr>
					
				<!--=======================GROUP PRODUK==============
				<!--=================MENU GAMBAR SAMPING GROUP=======-->
					<div class="row">	
						@foreach($group as $gr)
							<div class="col-sm-4 col-md-3">
								@if($gr->display_on_home)
									<a href="{{url('store/group/'.$gr->id)}}" style="color:gray"> <img class="img-fluid"src="{{asset('/storage/'.$gr->gambar)}}"></a>
								@endif
							</div>	
						@endforeach
					</div>
				<!---================================================--->
				
		</div>
	</div>

	
@endsection