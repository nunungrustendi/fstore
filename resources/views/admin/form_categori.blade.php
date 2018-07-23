@extends('admin.admin_master')

@section('header')
	
	<h4> Admin Panel</h4>
	
@endsection


@section('content')

	<hr>
	<h4>Data Kategori</h4>
	<hr>
	{{ Form::model($kategori,['method'=>$method,'url'=>$url,'files'=>true])}}
        @csrf
		<div class="form-group">
			{{Form::label('nama','Nama Kategori')}}
			{{Form::text('nama',$kategori->nama,['class'=>'form-control'])}}
		</div>.
		<div class="form-group">
			{{Form::label('detail','Detail')}}
			{{Form::textarea('detail',$kategori->detail,['class'=>'form-control','rows'=>3])}}
		</div>	
		
		<div class="row form-group">
			<figure class="col-2">
				<img src="{{asset('./storage/'.$kategori->gambar)}}" class="img-fluid border border-primary" alt="tidak ada gambar">
				<figcaption class="text-center align-middle" style="background-color:pink">{{$kategori->nama}}</figcaption>
			</figure>
						
			<div class="col-3">
			@if($kategori->gambar)
				Edit Gambar
			@else
				Upload Gambar
			@endif
			{{ Form::file('gambar')}}
			</div>
		</div>
		
		
		<hr><button class="btn btn-outline-primary" type='submit'><img width="24" height="24" src={{asset("/icon/save_icon.svg")}}></button><hr>

	{{ Form::close()}}
	
	@foreach($errors->all() as $message)
		<div class="alert alert-warning" role="alert">
				{{$message}}
		</div>
	@endforeach
	
@endsection