@extends ('layouts.master')

@section('content')
	<div class="container col-md-12"> 
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	      <div class="item active">
	        <img src="{{asset('/img/logo/doctorstrange.jpg')}}" alt="Doctor Strange" style="width:100%; height:400px; ">
	      </div>

	      <div class="item">
	        <img src="{{asset('/img/logo/dunkirk.jpg')}}" alt="Dunkirk" style="width:100%; height:400px;">
	      </div>
	    
	      <div class="item">
	        <img src="{{asset('/img/logo/spiderman.jpg')}}" alt="Spiderman" style="width:100%; height:400px;">
	      </div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>
	

	<div class="container-fluid col-md-10 col-md-offset-1" style="margin-top:7px;">
		<hr>
		@foreach($entry as $entry)
			<div class="col-md-3 col-sm-2" style="margin-top:25; margin-bottom:25;">

				<div class="col-md-12">
					<a href="/entry/{{$entry->id}}" title="">
						<img src= "{{$entry->image_url}}" alt="{{$entry->title}}">
						<h4 style="color:white"><article><b>{{ucwords(strtolower($entry->title))}}</b><br><small>{{Carbon\Carbon::parse($entry->release_year)->year}}</small></article></h4>
					</a>
				</div>
			</div>
		@endforeach
		
	</div>

@endsection
