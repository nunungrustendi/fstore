@extends('admin.admin_master')

@section('header')
		<h4> Admin Panel</h4>
	
@endsection


@section('content')
	<hr>
	<h4>Data Merk</h4>
	<hr>
	{{ Form::model($merk,['method'=>$method,'url'=>$url,'files'=>true])}}
        @csrf
		<div class="form-group">
			{{Form::label('nama','Nama Merk')}}
			{{Form::text('nama',$merk->name,['class'=>'form-control'])}}
		</div>.
		<div class="form-group">
			{{Form::label('detail','Detail')}}
			{{Form::textarea('detail',$merk->detail,['class'=>'form-control','rows'=>3])}}
		</div>
		
		
		
		<figure class="col-2">
				<img src="{{asset('./storage/'.$merk->gambar)}}" class="img-fluid border border-primary" alt="tidak ada gambar">
				<figcaption class="text-center align-middle" style="background-color:pink">{{$merk->nama}}</figcaption>
		</figure>
						
		<div class="col-3">
			@if($merk->gambar)
				Edit Gambar
			@else
				Upload Gambar
			@endif
			{{ Form::file('gambar')}}
		</div>
		
		
		
		<hr><button class="btn btn-outline-primary" type='submit'><img width="24" height="24" src={{asset("/icon/save_icon.svg")}}></button><hr>

	{{ Form::close()}}
	@foreach($errors->all() as $message)
		<div class="alert alert-warning" role="alert">
				{{$message}}
		</div>
	@endforeach
	
@endsection