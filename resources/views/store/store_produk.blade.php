@extends('store.store_master')

@section('headfb')
		<!--===========FACEBOOK Share================-->
		 <!-- You can use Open Graph tags to customize link previews.
		Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
		  <meta property="og:url"           content="{{url()->current()}}" />
		  <meta property="og:type"          content="website" />
		  <meta property="og:title"         content="FORIS brand" />
		  <meta property="og:description"   content="Produk" />
		  <meta property="og:image"         content="{{asset('/storage/'.$product->gambar1)}}" />
		
		<!--============End Of Facebook==============-->
@endsection

	<!-- ------------Load Facebook SDK for JavaScript ----->
	  <div id="fb-root"></div>
	  <script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
			fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>
	<!----------------------------------------------------->


@section('header')
@endsection


@section('main_menu')
	@include('store.store_sub_mainmenu',['categories'=>$categories,'merk'=>$merk])
@endsection

@section('content')
<hr>
	<div class="bg-secondary text-white p-2">
	>>{{$product->nama}}
	</div>
	<div class="row align-items-top">
		
		<div class="col-12 col-sm-8">
			
			<!-------------- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="gb1" role="tabpanel" aria-labelledby="gb1-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar1)}}" alt="Card image cap"></div>
				<div class="tab-pane" id="gb2" role="tabpanel" aria-labelledby="gb2-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar2)}}" alt="Card image cap"></div>
				<div class="tab-pane" id="gb3" role="tabpanel" aria-labelledby="gb3-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar3)}}" alt="Card image cap"></div>
				<div class="tab-pane" id="gb4" role="tabpanel" aria-labelledby="gb4-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar4)}}" alt="Card image cap"></div>
				<div class="tab-pane" id="gb5" role="tabpanel" aria-labelledby="gb5-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar5)}}" alt="Card image cap"></div>
				<div class="tab-pane" id="gb6" role="tabpanel" aria-labelledby="gb6-tab"><img class="img-fluid img-thumbnail" src="{{asset('/storage/'.$product->gambar6)}}" alt="Card image cap"></div>
			</div>
			
			<!-- Nav tabs -->
			<hr>
			<ul class="nav nav-pills" id="myTab" role="tablist">
				@if($product->gambar1)
					<li class="col-2 ">
						<a class="active" id="gb1-tab" data-toggle="tab" href="#gb1" role="tab" aria-controls="gb1" aria-selected="true"><img class="border img-fluid" src="{{asset('/storage/'.$product->gambar1)}}" alt="Card image cap"></a>
					</li>
				@endif
				@if($product->gambar2)
					<li class="col-2 ">
						<a class="" id="gb2-tab" data-toggle="tab" href="#gb2" role="tab" aria-controls="gb2" aria-selected="false"><img class="border img-fluid img" src="{{asset('/storage/'.$product->gambar2)}}" alt="Card image cap"></a>
					</li>
				@endif
				@if($product->gambar3)
					<li class="col-2 ">
						<a class="" id="gb3-tab" data-toggle="tab" href="#gb3" role="tab" aria-controls="gb3" aria-selected="false"><img class=" border img-fluid" src="{{asset('/storage/'.$product->gambar3)}}" alt="Card image cap"></a>
					</li>
				@endif				
				
				@if($product->gambar4)
					<li class="col-2 ">
						<a class="" id="gb4-tab" data-toggle="tab" href="#gb4" role="tab" aria-controls="gb4" aria-selected="false"><img class=" border img-fluid" src="{{asset('/storage/'.$product->gambar4)}}" alt="Card image cap"></a>
					</li>
				@endif				
				
				@if($product->gambar5)		
					<li class="col-2 ">
						<a class="" id="gb5-tab" data-toggle="tab" href="#gb5" role="tab" aria-controls="gb5" aria-selected="false"><img class="border img-fluid" src="{{asset('/storage/'.$product->gambar5)}}" alt="Card image cap"></a>
					</li>
				@endif		
				@if($product->gambar6)				
					<li class="col-2">
						<a class="" id="gb6-tab" data-toggle="tab" href="#gb6" role="tab" aria-controls="gb6" aria-selected="false"><img class="border img-fluid" src="{{asset('/storage/'.$product->gambar6)}}" alt="Card image cap"></a>
					</li>
				@endif
			</ul>
			<hr>
			
		</div>
		
		<div class="col-0 col-sm-4">
			<div class="p-3 ml-2 mt-2 h6 text-uppercase text-center" style="background-color:linen">{{$product->nama}}</div>

			<dl>
				<dt style="color:gray;">Harga: </dt>
				<dd class="ml-2 p-2 text-center h5" style="color:gray; background-color:beige">Rp. {{number_format($product->harga_aktual)}}   </dd>
				<dd class="ml-2 p-2 text-right" style="color:gray; background-color:beige"><small><del>Rp. {{number_format($product->harga_dasar)}}<del> </small>
				@if($product->harga_aktual< $product->harga_dasar)
						<span class="badge badge-warning shadow">&nbsp;&nbsp;{{number_format((-($product->harga_dasar-$product->harga_aktual)/$product->harga_dasar)*100,0)}}%</span>
				@endif
				</dd>
			</dl>

			<dl>
				<dt style="color:gray">Kategori: </dt>
				@if($product->kategori)
					<dd class="ml-2 p-2" style="color:gray; background-color:beige">{{$product->kategori->nama}}</dd>
				@else
					<dd class="ml-2 p-2" style="color:gray; background-color:beige">-</dd>
				@endif
			</dl>
			<dl>
				<dt style="color:gray">Deskripsi: </dt>
				<dd class="ml-2 p-2" style="white-space:pre-line; color:gray; background-color:beige;">{{$product->deskripsi}}</dd>
			</dl>
			<dl>
				<dt style="color:gray">Detail: </dt>
				<dd class="ml-2 p-2" style="white-space:pre-line; color:gray; background-color:beige;">{{$product->detail}}</dd>
			</dl>

			<dl>
				<dt style="color:gray">Jumlah dilihat: </dt>
				<dd class="ml-2 p-2" style="color:gray; background-color:beige">{{$product->num_view}} kali</dd>
			</dl>
			
			<!------------>
				<a class="btn btn-outline-success" target="_blank" href="https://wa.me/6281324507224?text=FORIS brand%0dSaya%20pesan%20produk:%0d{{$product->nama}}" role="button"><img width="24" height="24" src={{asset("/icon/whatsapp_icon.svg")}}>&nbsp;Pesan/Order</a>
				<a class="btn btn-outline-warning" href="{{url('store/addtocart/'.$product->id)}}" role="button"><img width="24" height="24" src={{asset("/icon/troli_3_icon.svg")}}>&nbsp;Tambah</a>
			<!------------>
			
			<div class="row mt-2 p-2" style="background-color:beige">
				<div class="col">Bagikan :</div>
				<div class="col"><a style="color:teal" target="_blank" href="https://wa.me/?text=FORIS%20brand:%20%0d{{url()->current()}}"><img width="24" height="24" src={{asset("/icon/whatsapp_icon.svg")}}></a></div>								
				<div class="col fb-share-button" data-href="{{url()->current()}}" data-layout="button_count">fb</div>
				<div class="col"><a style="color:teal" target="_blank" href="mailto:?subject=FORISbrand&body={{url()->current()}}" title="email"><img width="24" height="24" src={{asset("/icon/mail_color_icon.svg")}}></a></div>
			</div>
			
			<!-- Your share button code -->
			  
			
		</div>
	</div>
	
	@if($prod)
			<div class="row bg-secondary text-white p-2">
				Produk Sejenis : ({{$prod->count()}})
			</div>
			
			<div class="d-flex flex-row mt-2 mb-2" style="overflow-y:hidden; overflow-x:auto; -ms-overflow-style:none">
			<hr>
				@foreach($prod as $pr)
					<div class="flex-nowrap col-6 col-sm-3 col-md-2" style="">
						<a href="{{url('store/product/'.$pr->id)}}">
							<img class="border img-fluid" src="{{asset('/storage/'.$pr->gambar1)}}" alt="Card image cap">
							<div class="text-center text-capitalize" style="color:gray">{{$pr->nama}}</div>
						</a>
					</div>
				@endforeach
			<hr>	
			</div>
	@endif

@endsection