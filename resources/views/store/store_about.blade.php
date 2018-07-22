@extends('store.store_master')

@section('header')
	@include('store.store_sub_slide',['gbr'=>$gbr])
@endsection


@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection



@section('content')
	<hr>
	<div class="bg-secondary text-white p-2">
		Tentang Kami
	</div>

	<div class="card">
		<div class="card-body">
		
		<p class="card-text"> Foris-brand merupakan toko online yang menyediakan produk-produk fashion.  Kami menyediakan produk-produk berkualitas dari berbagai merk.</p>
		</div>
	</div>
@endsection