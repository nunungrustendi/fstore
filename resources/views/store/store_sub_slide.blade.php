
<!------------------------------------ slide Utama ---------------------------------------------->
				
<div id="carID" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
		@foreach($gbr as $gr)
			@if($loop->first)
				 <li data-target="#carID" data-slide-to="$loop->index" class="active"></li>
			@else
				<li data-target="#carID" data-slide-to="$loop->index"></li>
			@endif
		@endforeach
	  </ol>
	  <div class="carousel-inner">
			@foreach($gbr as $gr)
				@if($loop->first)
					<div class="carousel-item active">
					  <img class="d-block w-100" src="{{asset('/storage/'.$gr->gambar)}}" alt="First slide">
					</div>
				@else
					<div class="carousel-item">
					  <img class="d-block w-100" src="{{asset('/storage/'.$gr->gambar)}}" alt="next slide">
					</div>
				@endif
			@endforeach
		
	  </div>
	  <a class="carousel-control-prev" href="#carID" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carID" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
				
				
			<!---------------------------------------------end of slide utama----------------------------------------->
