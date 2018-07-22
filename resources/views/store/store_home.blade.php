@extends('store.store_master')

@section('header')

<div id="carID" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carID" data-slide-to="0" class="active"></li>
    <li data-target="#carID" data-slide-to="1"></li>
    <li data-target="#carID" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/c1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/c2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/c3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carID" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carID" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
	
@endsection

@section('content')
	<hr>
		<h4>KATEGORI PRODUK</h4>
	<hr>
	<div class="row">
		@foreach($categories as $cate)
			<div class="col-4 col-sm-3 col-md-2">
				<a href="{{url('store/category/'.$cate->id)}}">
				<div class="card" style="width:100%">
					<img class="card-img-top img-fluid img-thumbnail" src="{{asset('/storage/'.$cate->gambar)}}" alt="Card image cap">
						<div class="card-body">
							<p class="card-text ">{{$cate->nama}}</p>
						</div>
				</div>
				</a>
				
				
			</div>
		@endforeach
	</div>
	
	<hr>
	<h4>PRODUK TERLARIS</h4>
	<hr>
	<div class="row">
		@foreach($prod_laris as $prod)
			<div class="col-6 col-sm-4 col-md-3">
				<a href="{{url('store/product/'.$prod->id)}}">
				<div class="card" style="width:100%">
					<img class="card-img-top img-fluid img-thumbnail" src="{{asset('/storage/'.$prod->gambar1)}}" alt="Card image cap">
						<div class="card-body pr-3">
							<p class="card-text mt-0 mb-0">{{$prod->nama}}</p>
							<p class="card-text mt-0 mb-0"><del>Rp. {{number_format($prod->harga_dasar)}}<del></p>
							<span class="card-text mt-0 mb-0 text-warning text-weight-bold h5">Rp. {{number_format($prod->harga_aktual)}}</span>
							@if($prod->harga_aktual<$prod->harga_dasar)
								<span class="badge badge-primary shadow p-2 mb-3">{{number_format((($prod->harga_dasar-$prod->harga_aktual)/$prod->harga_dasar)*100,0)}}%</span>
							@endif
						</div>
				</div>
				</a>
			</div>
		@endforeach
	</div>
	
	
	
	
	<hr>
	<h4>PRODUK DISKON</h4>
	<hr>
	<div class="row">
		@foreach($prod_diskon as $prod)
			<div class="col-6 col-sm-4 col-md-3">
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