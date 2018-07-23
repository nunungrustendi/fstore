<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"	content="width=device-width,initial-scale=1">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

		<title>Toko Online</title>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
				<!-----------------------------Status User Login------------------------------------------------------>
				<p class="text-right">Login sebagai {{Auth::user()->name}}</p>
				<div class="text-right">
					<a href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
						 {{ __('Logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
				<!-----------------------------Status User Login------------------------------------------------------->
			<!-- MENU UTAMA -->
				<nav class="navbar navbar-expand-lg navbar-dark bg-info text-white">
				  <a class="navbar-brand" href="#"><img class="img-fluid" src={{asset("images/logo_foris.png")}}> </a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item active">
						<a class="nav-link" href="{{url('admin/category')}}">Data Kategori <span class="sr-only">(current)</span></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{url('admin/merk')}}">Data Merk</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{url('admin/product')}}">Data Produk</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{url('admin/group')}}">Data Kelompok Produk</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="{{url('admin/gambar')}}">Slide "Carousel"</a>
					  </li>
					</ul>
					
				  </div>
				</nav>
			<!--End of Menu utama-->	


				<hr>
			</div>
			
			
			@yield('content')
			
			<!--FOOTER-->
			<hr>
			<div class="row" style="background-color:beige; min-height:80px;">
				
				<span class="col-4 d-inline-block ">
						<span class="align-middle"><img src={{asset("/images/logo_foris.png")}}>@2018</span>
				</span>
				<div class="col-8">
						<div class="row pl-2" style="color:teal">
							Kontak:
						</div>
						<div class="row mt-2">
								<div class="col"><a style="color:teal" target="_blank" href="https://wa.me/?text=FORIS brand%0d"><img width="24" height="24" src={{asset("/icon/whatsapp_icon.svg")}}>&nbsp;Whatsapp</a></div>								
								<div class="col"><a style="color:teal" target="_blank" href="https://www.facebook.com/"><img width="24" height="24" src={{asset("/icon/facebook_icon.svg")}}>&nbsp;Facebook</a></div>
								<div class="col"><a style="color:teal" target="_blank" href="https://mail.google.com/"><img width="24" height="24" src={{asset("/icon/mail_color_icon.svg")}}>&nbsp;E-mail</a></div>
						</div>	
				</div>
			</div>
		<!--END FOOTER-->	
		
		</div>
		
		
	</body>
</html>