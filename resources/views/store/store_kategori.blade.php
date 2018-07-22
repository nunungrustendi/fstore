@extends('store.store_master')
@section('header')
	
	
@endsection


@section('content')
	<hr>
	KATEGORI	:	
	<hr>
	
	<div class="row">
		@foreach($product as $prod)
			<div class="col-sm-4 col-md-3">
				<a href="{{url('store/product/'.$prod->id)}}">
				<div class="card" style="width:100%">
					<img class="card-img-top img-fluid img-thumbnail" src="{{asset('/storage/'.$prod->gambar1)}}" alt="Card image cap">
						<div class="card-body pr-3">
							<p class="card-text mt-0 mb-0">{{$prod->nama}}</p>
							<p class="card-text mt-0 mb-0"><del>Rp. {{number_format($prod->harga_dasar)}}<del></p>
							<span class="card-text mt-0 mb-0 text-warning text-weight-bold h5">Rp. {{number_format($prod->harga_aktual)}}   </span>
							@if($prod->harga_aktual<$prod->harga_dasar)
								<span class="badge badge-primary shadow p-2 mb-3">{{number_format((($prod->harga_dasar-$prod->harga_aktual)/$prod->harga_dasar)*100,0)}}%</span>
							@endif
						</div>
				</div>
				</a>
			</div>
		@endforeach
	</div>
		
@endsection