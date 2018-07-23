@extends('admin.admin_master')

@section('header')
	<h4> Admin Panel</h4>
	
@endsection


@section('content')

	<h4>Data Produk</h4>
	{{ Form::model($product,['method'=>$method,'url'=>$url,'files'=>true])}}
	    @csrf
		<div class="row">
				<div class="col form-group">
					{{Form::label('kategori_id','Kategori')}}
					{{Form::select('kategori_id',$categ_options,($product->kategori)?($product->kategori->id):'',['class'=>'form-control'])}}
				</div>
				<div class="col form-group">
					{{Form::label('merk_id','Merk')}}
					{{Form::select('merk_id',$merk_options,($product->merk)?($product->merk->id):'',['class'=>'form-control'])}}
				</div>
		</div>
		
		<div class="form-group">
		{{Form::label('nama','Nama Produk')}}
		{{Form::text('nama',$product->nama,['class'=>'form-control'])}}
		</div>.

		<div class="form-group">
		{{Form::label('deskripsi','Deskripsi')}}
		{{ Form::textarea('deskripsi',$product->deskripsi,['class'=>'form-control','rows'=>3])}}
		</div>
		
		<div class="form-group">
		{{Form::label('detail','Detail')}}
		{{ Form::textarea('detail',$product->detail,['class'=>'form-control','rows'=>3])}}
		</div>		
			
		<div class="row">	
				<div class="col form-group">
				{{Form::label('harga_dasar','Harga Dasar')}}
				{{ Form::number('harga_dasar',$product->harga_dasar,['class'=>'form-control'])}}
				</div>
				<div class="col form-group"> 
				{{Form::label('harga_aktual','Harga Aktual')}}
				{{ Form::number('harga_aktual',$product->harga_aktual,['class'=>'form-control'])}}
				</div>

		</div>	

		<div class="form-group">
			{{Form::label('gambar produk','Gambar Produk')}}
			<div class="row">
				<div class="col">{{ Form::file('gambar1')}}		</div>
				<div class="col">{{ Form::file('gambar2')}}		</div>
				<div class="col">{{ Form::file('gambar3')}}		</div>	
			</div>	
			<div class="row">			
				<div class="col">{{ Form::file('gambar4')}}		</div>		
				<div class="col">{{ Form::file('gambar5')}}		</div>
				<div class="col">{{ Form::file('gambar6')}}		</div>	
			</div>				
		</div>
			
		<hr>
			<button class="btn btn-outline-primary" type='submit'><img width="24" height="24" src={{asset("/icon/save_icon.svg")}}></button>
		<hr>

	{{ Form::close()}}
	<!--Display Error Validation-->
	@foreach($errors->all() as $message)
		<div class="alert alert-warning" role="alert">
				{{$message}}
		</div>
	@endforeach
	
@endsection