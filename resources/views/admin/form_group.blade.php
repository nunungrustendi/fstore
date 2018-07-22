@extends('admin.admin_master')

	<script>
			function selectProduk(id,value)	
				{
					parent=document.getElementById("sel2"); //select tujuan display
					//CHECK IF EXIST
						for(var i=0;i<parent.options.length;i++)
							{
								if(parent.children[i].id==id)
									{return;}//Item sudah ada dalam list (tidak bida ditambahkan)
							}
					
					//End of Check
					var ch=document.createElement("option");
					ch.id=id;
					ch.value=id;
					ch.innerHTML=value;
					parent.appendChild(ch);
					
					ch.onclick=deleteOption;
				}
				
			function deleteOption(e)
				{	if (!e) var e = window.event;
					parent=document.getElementById("sel2"); 
					parent.removeChild(e.target);
				}
				
			function selectAllProduct()
				{
					var sel=document.getElementById("sel2"); //select tujuan display
					for(var i=0;i<sel.options.length ;i++)
						{
							sel.children[i].selected='selected';
						}
				}
			
		</script>

@section('header')
		<h4> Admin Panel</h4>
@endsection


@section('content')
	<hr>
	<h4>Data Group</h4>
	<hr>
	{{ Form::model($group,['method'=>$method,'url'=>$url,'files'=>true])}}

		<div class="form-group">
		
			{{Form::label('nama','Nama Group')}}
			{{Form::text('nama',$group->nama,['class'=>'form-control'])}}
			@if($errors->has('nama'))
				<span style="color:red">Field nama harus diisi!!</span>
			@endif
		</div>
		<div class="form-group">
			{{Form::label('detail','Detail')}}
			{{Form::textarea('detail',$group->detail,['class'=>'form-control','rows'=>3])}}
		</div>
			
		<div class="col form-group">
			{{Form::label('display_on_home','Tampilkan pada halaman Home')}}
			{{Form::select('display_on_home',[FALSE=>'Tidak',TRUE=>'YA'],$group->display_on_home,['class'=>'form-control'])}}
		</div>
		
		
		
		<div class="row">
				
				<figure class="col-2">
					<img  class="img-fluid" src="{{asset('./storage/'.$group->gambar)}}"	  alt="Tidak/Belum ada Gambar">	
					<figcaption>{{$group->nama}}</figcaption>
				</figure>
							
				<div class="form-group col-3">
				@if($method=='put')
					{{Form::label('gambar','Edit Logo Grup')}}
				@else
					{{Form::label('gambar','Buat Logo Grup')}}
				@endif
					<div>{{ Form::file('gambar')}}</div>
				</div>
		</div>
		
		
		{{--Angota Group Produk--}}		
		
		<div class="row">
			<div class="col-8 form-group">
			Silahkan Pilih Produk:
				<div class="row bg-primary">	
					@foreach($products as $prod)
						<button type="button"class="col-2"  id="{{$prod->id}}" value="{{$prod->nama}}" onclick="selectProduk(id,value)">
							<figure >
								<img  class="img-fluid" src="{{asset('./storage/'.$prod->gambar1)}}"	  alt="Tidak/Belum ada Gambar">	
								<figcaption><small>{{$prod->nama}}</small></figcaption>
							</figure>
						</button>
					@endforeach
				</div>	
			</div>
			
			<div class="col-4 form-group">
				<label for="sel2">Produk terpilih :</label>
				<select id="sel2" name="member[]" multiple="multiple" size="6" style="width:100%" >
				@foreach($group->produk as $prod)
					<option id="{{$prod->id}}" value="{{$prod->id}}" onclick="deleteOption(window.event)">{{$prod->nama}}</option>
				@endforeach
				</select>
			</div>
		</div>
		
		<hr><button class="btn btn-outline-primary" type="submit" onclick="selectAllProduct()"><img width="24" height="24" src="/icon/save_icon.svg"></button><hr>
		

	{{ Form::close()}}

	@foreach($errors->all() as $message)
		<div class="alert alert-warning" role="alert">
			{{$message}}
		</div>
	@endforeach
	
@endsection