@extends('admin.admin_master')

@section('header')
	<h4 class="text-right">Silahkan Login</h4>
	
@endsection


@section('content')
	<div class="row">
		<div class="col-md-6">
		</div>
		<div class="col-md-6">
			{{ Form::open(['url'=>'admin/'])}}
			    @csrf
				<div class="form-group">
					{{Form::label('name','Nama Pengguna')}}
					{{Form::text('name','',['class'=>'form-control'])}}
				</div>.
				<div class="form-group">
					{{Form::label('password','Password')}}
					{{Form::text('password','',['class'=>'form-control'])}}
				</div>	
				<hr><button class="btn btn-primary" type='submit'>Login</button><hr>
			{{ Form::close()}}
		</div>
		
	</div>
@endsection