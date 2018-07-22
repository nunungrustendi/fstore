@extends('admin.admin_master')

@section('header')
		<h4> Admin Panel</h4>
	
@endsection


@section('content')
	<hr>
	<h4>Data Gambar</h4>
	<hr>
	{{ Form::model($gbr,['method'=>$method,'url'=>$url,'files'=>true])}}

		<div class="form-group">
			{{Form::label('nama','Nama Gambar')}}
			{{Form::text('nama',$gbr->nama,['class'=>'form-control'])}}
		</div>.
		
		<figure class="col-2">
				<img src="{{asset('./storage/'.$gbr->gambar)}}" class="img-fluid border border-primary" alt="tidak ada gambar">
				<figcaption class="text-center align-middle" style="background-color:pink">{{$gbr->nama}}</figcaption>
		</figure>
						
		<div class="col-3">
			@if($gbr->gambar)
				Edit Gambar
			@else
				Upload Gambar
			@endif
			{{ Form::file('gambar')}}
		</div>
		
		<hr><button class="btn btn-outline-primary" type='submit'><img width="24" height="24" src="/icon/save_icon.svg"></button><hr>

	{{ Form::close()}}
	@foreach($errors->all() as $message)
		<div class="alert alert-warning" role="alert">
				{{$message}}
		</div>
	@endforeach
	
@endsection