@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		
	</div>
	<div class="col-md-10 col-md-offset-1">
		@foreach($genre as $entry)
			@foreach($entry->entry as $final_entry)
				<div class="col-md-3">
					<div class="col-md-12">
						<a href="/entry/{{$final_entry->id}}">
							<img src="{{$final_entry->image_url}}" alt="{{$final_entry->title}}">
							<h4><strong>{{ucwords(strtolower($final_entry->title))}}</strong></h4>
						</a>
					</div>
				</div>
			@endforeach
		@endforeach
	</div>

@endsection