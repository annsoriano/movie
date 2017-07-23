@extends('layouts.master')
 
@section('content')
	<div class="col-md-12" style="border-left: 30px solid #d77ee5; margin-left:-12px; margin-top:-7px;">
		<h3 class="vertical" style=" color:white; position:absolute; margin-top:260px; margin-left:-110px;" >NEW MOVIES</h3>
		<div class="col-md-10 col-md-offset-1">
		
		@foreach($entry as $entry)
			@foreach($movie->take(8) as $movie)
				<div class="col-md-3">
					<div class="col-md-12">
						<a href="/entry/{{$movie->id}}" title="">
							<img src="{{$movie->image_url}}" alt="{{$movie->title}}">
							<h4><article><b>{{ucwords(strtolower($movie->title))}}</b><br><small>{{Carbon\Carbon::parse($entry->release_year)->year}}</small></article></h4>
						</a>
					</div>
				</div>
			@endforeach	
		@endforeach
		</div>
	</div>
	<div class="col-md-12" style="border-left: 30px solid #8488d8; margin-left:-12px; margin-top:2px;">
		<h3 class="vertical" style=" color:white; position:absolute; margin-top:260px; margin-left:-125px;" >NEW TV SHOWS</h3>
		<div class="col-md-10 col-md-offset-1" style="margin-top:10px;" >
			@foreach($entry as $entry2)
				@foreach($tvshow->take(8) as $tvshow)
					<div class="col-md-3">
						<div class="col-md-12">
							<a href="/entry/{{$tvshow->id}}">
								<img src="{{$tvshow->image_url}}" alt="{{$tvshow->title}}">
								<h4><article><b>{{ucwords(strtolower($tvshow->title))}}</b><br><small>{{Carbon\Carbon::parse($entry->release_year)->year}}</small></article></h4>
							</a>
						</div>
					</div>
				@endforeach	
			@endforeach	
		</div>
	</div>
	
	
	
@endsection