@extends('admin.admin_master')

@section('header')
	<h4> Admin Panel</h4>
	
@endsection


@section('content')

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
		<a class="nav-link active" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="true">Data Kategori</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="merk-tab" data-toggle="tab" href="#merk" role="tab" aria-controls="merk" aria-selected="false">Data Merk</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">Data Produk</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="carousel-tab" data-toggle="tab" href="#carousel" role="tab" aria-controls="carousel" aria-selected="false">Data Gambar Carousel</a>
	  </li>
	</ul>
	<!--end Nav tabs-->

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="category" role="tabpanel" aria-labelledby="category-tab">
	  {{ Form::model($kategori,['method'=>$method,'url'=>$url,'files'=>true])}}

		<div class="form-group">
			{{Form::label('nama','Nama Kategori')}}
			{{Form::text('nama',$kategori->nama,['class'=>'form-control'])}}
		</div>.
		<div class="form-group">
			{{Form::label('detail','Detail')}}
			{{Form::textarea('detail',$kategori->detail,['class'=>'form-control','rows'=>3])}}
		</div>	
		<div class="form-group">
			{{Form::label('gambar produk','Gambar Produk')}}
			<div>{{ Form::file('gambar')}}</div>
		</div>
		<hr><button class="btn btn-primary" type='submit'>Simpan Data</button><hr>


	{{ Form::close()}}
	
	  </div>
	  <div class="tab-pane" id="merk" role="tabpanel" aria-labelledby="merk-tab">
		{{ Form::model($merk,['method'=>$method,'url'=>$url,'files'=>true])}}

			<div class="form-group">
				{{Form::label('nama','Nama Merk')}}
				{{Form::text('nama',$merk->name,['class'=>'form-control'])}}
			</div>.
			<div class="form-group">
				{{Form::label('detail','Detail')}}
				{{Form::textarea('detail',$merk->detail,['class'=>'form-control','rows'=>3])}}
			</div>
			
			<div class="form-group">
				{{Form::label('gambar','Logo Produk')}}
				<div>{{ Form::file('gambar')}}		</div>
			</div>
			<hr><button class="btn btn succes" type='submit'>Simpan Data</button><hr>

		{{ Form::close()}}
	  </div>
	  <div class="tab-pane" id="product" role="tabpanel" aria-labelledby="product-tab">

		{{ Form::model($product,['method'=>$method,'url'=>$url,'files'=>true])}}
			<div class="form-group">
			{{Form::label('kategori_id','Kategori')}}
			{{Form::select('kategori_id',$categ_options,'',['class'=>'form-control'])}}
			</div>
				
			<div class="form-group">
			{{Form::label('merk_id','Merk')}}
			{{Form::select('merk_id',$merk_options,'',['class'=>'form-control'])}}
			</div>

			<div class="form-group">
			{{Form::label('user_id','User')}}
			{{ Form::select('user_id',[1=>'User 1'],'',['class'=>'form-control'])}}
			</div>
			
			<div class="form-group">
			{{Form::label('nama','Nama Produk')}}
			{{Form::text('nama',$product->nama,['class'=>'form-control'])}}
			</div>.
			
			<div class="form-group">
			{{Form::label('paket_kotak','Isi dalam kotak')}}
			{{Form::text('paket_kotak',$product->paket_kotak,['class'=>'form-control'])}}
			</div>
			
			<div class="form-group">
			{{Form::label('garansi','Masa Garansi')}}	
			{{Form::text('garansi',$product->garansi,['class'=>'form-control'])}}
			</div>
			
			<div class="form-group">
			{{Form::label('deskripsi','Deskripsi')}}
			{{ Form::textarea('deskripsi',$product->deskripsi,['class'=>'form-control','rows'=>3])}}
			</div>
			
			<div class="form-group">
			{{Form::label('detail','Detail')}}
			{{ Form::textarea('detail',$product->detail,['class'=>'form-control','rows'=>3])}}
			</div>		
				
			<div class="form-group">
			{{Form::label('harga_dasar','Harga Dasar')}}
			{{ Form::number('harga_dasar',$product->harga_dasar,['class'=>'form-control'])}}
			</div>
			
			<div class="form-group"> 
			{{Form::label('harga_aktual','Harga Aktual')}}
			{{ Form::number('harga_aktual',$product->harga_aktual,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
			{{Form::label('rating','Rating')}}
			{{ Form::number('rating',$product->rating,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
			{{Form::label('num_view','Jumlah dilihat')}}
			{{ Form::number('num_view',$product->num_view,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
			{{Form::label('num_stock','Jumlah Stok')}}
			{{ Form::number('num_stock',$product->num_stock,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
			{{Form::label('num_sold','Jumlah Terjual')}}
			{{ Form::number('num_sold',$product->num_sold,['class'=>'form-control'])}}
			</div>		
				
			<div>
			{{Form::label('sponsored','Produk Sponsor')}}
			{{ Form::select('sponsored',['0'=>'Bukan','1'=>'Ya'],$product->sponsored,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				{{Form::label('gambar produk','Gambar Produk')}}
				<div>{{ Form::file('gambar1')}}		</div>
				<div>{{ Form::file('gambar2')}}		</div>
				<div>{{ Form::file('gambar3')}}		</div>			
				<div>{{ Form::file('gambar4')}}		</div>		
				<div>{{ Form::file('gambar5')}}		</div>
				<div>{{ Form::file('gambar6')}}		</div>	
			</div>
				
			<hr>
				<button class="btn btn-succes" type='submit'>Simpan Data</button>
			<hr>


		{{ Form::close()}}

	  </div>
	  <div class="tab-pane" id="carousel" role="tabpanel" aria-labelledby="carousel-tab">
	  ...
	  </div>
	</div>
	<!--end Tab Panes-->


	
@endsection