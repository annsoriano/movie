@extends('layouts.master')

@section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="col-md-12">
		@foreach($entries as $entry)
			<div class="col-md-3 col-sm-2" style="color: black; margin-top:25; margin-bottom:25;">

				<div class="col-md-12">
					<a href="/entry/{{$entry->id}}" title="">
						<img src= "{{$entry->image_url}}" alt="{{ucwords(strtolower($entry->title))}}">
						<h4><article><b>{{ucwords(strtolower($entry->title))}}</b><br><small>{{Carbon\Carbon::parse($entry->release_year)->year}}</small></article></h4>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	<div class="pagination pull-right"> {{!! $entries->links() !!}} </div>
</div>
@endsection