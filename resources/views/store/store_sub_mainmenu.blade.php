
			<!------------------------------------ MENU Utama ---------------------------------------------->
				
			
				<nav class="navbar navbar-expand-md" style="background-color:lightpink">
					<a class="navbar-brand" href="{{url('/')}}"> <img class="img-fluid" src={{asset("images/logo_foris.png")}}></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span><img width="24" height="24" src={{asset("/icon/menu_icon.svg")}}></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent" >
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
									<a class="nav-link" href="{{url('/')}}" style="color:dimgray">Beranda <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" style="color:dimgray" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Kategori
									</a>
									<div class="dropdown-menu" style="background-color:oldlace" aria-labelledby="navbarDropdown">
										@foreach($categories as $cate)
											<a class="dropdown-item" style="color:dimgray" href="{{url('store/category/'.$cate->id)}}"> {{$cate->nama}}</a>
										@endforeach
									</div>
								</li>
							
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" style="color:dimgray" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Merk
									</a>
									<div class="dropdown-menu" style="background-color:oldlace" aria-labelledby="navbarDropdown">
										@foreach($merk as $mr)
											<a class="dropdown-item" style="color:dimgray" href="{{url('store/merk/'.$mr->id)}}"> {{$mr->nama}}</a>
										@endforeach
									</div>
								</li>
	  
								<li class="nav-item">	<a class="nav-link" href="{{url('store/diskon')}}" style="color:dimgray">
									On Sales</a>
								</li>
								  
								<li class="nav-item">	<a class="nav-link" href="{{url('store/carapesan')}}" style="color:dimgray">
									Cara Pemesanan</a>
								</li> 
								  
								<li class="nav-item">	<a class="nav-link" href="{{url('store/about')}}" style="color:dimgray">
									Tentang Kami</a>
								</li>
								  
							</ul>
								<form class="form-inline my-2 my-lg-0" action="{{url('store/search')}}" method="GET">
									@csrf
									<input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari" aria-label="Search">
									<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><img width="24" height="24" src={{asset("/icon/search_icon.svg")}}> Cari</button>
								</form>
						
								<a href="{{url('store/viewcart')}}">&nbsp;&nbsp;<img width="24" height="24" src={{asset("/icon/troli_3_icon.svg")}}></a>
					</div>
				</nav>
				
			<!---------------------------------------------end of menu utama----------------------------------------->
