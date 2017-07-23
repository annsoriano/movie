@extends ('layouts.master')

@section('content')

	<div class="container-fluid">
	 	
			<div class="col-md-4 movieShow">
				<img src="{{$entry->image_url}}" alt="{{$entry->title}}" style="height:100%; width:80%; margin-left:20px;">

			</div>
			<div class="col-md-8 movieShow" style="background-color:rgba(255,255,255,0.5);">
				<div class="col-md-12">
					<h1 style="font-family: 'Heebo', sans-serif;">{{(strtoupper($entry->title))}}</h1>
					<hr>
				</div>
				<div class="col-md-2">
					<strong><p>Release Year</p></strong>
					<strong><p>Uploaded by</p></strong>
					<strong><p>Rating</p></strong>
					<strong><p>Genre</p></strong>
					<strong><p>Updated</p></strong>
					<strong><p>Type</p></strong>
					<strong><p>Actor</p></strong>	
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<p>{{Carbon\Carbon::parse($entry->release_year)->year}}</p>
						<p>{{ucfirst(strtolower($entry->user->firstname)).' '.ucfirst($entry->user->lastname)}}</p>
						<p>{{$entry->rating}}</p>
						<p>
							@foreach($entry->genre as $genre)
								{{ucwords(strtolower($genre->name)).' '}}
							@endforeach
						</p>
						<p>{{$entry->updated_at->diffForHumans()}}</p>
						<p>{{$entry->entry_type_id->name}}</p>
						<p>
							@foreach($entry->actor as $actor)
								{{ucwords(strtolower($actor->name)).' '}}
							@endforeach
						</p>
					</div>
				</div>
				<div class="col-md-12">
					<hr>
					<strong><p>Synopsis</p></strong>
				 	<p style="text-indent:50px;">{{ucfirst($entry->synopsis)}}</p>
				</div>
				
			</div>
	</div>

@endsection
