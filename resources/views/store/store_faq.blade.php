@extends('master')

@section('header')
	
@endsection

@section('main_menu')

	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
	
@endsection

@section('content')
	F A Q:
	<p>Gambar Produk 1</p>
	<p>Gambar Produk 2</p>
	<p>Gambar Produk 3</p>
	<p>Gambar Produk 4</p>
	
@endsection