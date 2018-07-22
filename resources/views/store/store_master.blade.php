<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"	content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<title>FORIS brand</title>
		
		
		
		@yield('headfb')
		
	</head>
	
	<body>
	
	
		
	  
	
	
		<div class="container">
			<div class="page-header">
				@yield('header')
			
				@yield('main_menu')

			
				@if(Auth::check())
				<!-----------------------------Status User Login------------------------------------------------------>
					<div class="text-right">{{Auth::user()->name}}</div>
					<div class="text-right">
						<a href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
							 {{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				<!-----------------------------Status User Login------------------------------------------------------->
				@endif
			
			</div>
			
			@yield('content')
			
			<hr>
		<!--FOOTER-->
			<div class="row" style="background-color:beige; min-height:80px;">
				
				<span class="col-4 d-inline-block mt-4">
						<span class="align-middle mt-2"><img src={{asset("/images/logo_foris.png")}}>@2018</span>
				</span>
				<span class="col-1"></span>
				<div class="col-7">
						<div class="row pl-2 ml-2" style="color:teal">
							Kontak:
						</div>
						<div class="row mt-2 ml-2">
								<div class="col col-md-4"><a style="color:teal" target="_blank" href="https://wa.me/6281324507224?text=FORIS brand%0d"><img width="24" height="24" src={{asset("/icon/whatsapp_icon.svg")}}></a></div>								
								<div class="col col-md-4"><a style="color:teal" target="_blank" href="https://www.facebook.com/foris.suharni"><img width="24" height="24" src={{asset("/icon/facebook_icon.svg")}}></a></div>
								<div class="col col-md-4"><a style="color:teal" target="_blank" href="mailto:foris.suharni@gmail.com" title="email"><img width="24" height="24" src={{asset("/icon/mail_color_icon.svg")}}></a></div>
						</div>	
				</div>
			</div>
		<!--END FOOTER-->	
			
		</div>		<!--end of container-->
		
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>	
	</body>
</html>