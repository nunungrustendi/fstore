@extends('store.store_master')
@section('header')
	
	
@endsection

@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection

@section('content')
	<hr>
	<div class="bg-secondary text-white p-2">
	{{$title}}
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
@endsection