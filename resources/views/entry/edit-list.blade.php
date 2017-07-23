@extends ('layouts.master')

@section('content')
	<div class="container col-md-10 col-md-offset-1">

		@foreach($entries as $entry)
			@if($entry->user_id==$user)
				<div class="col-md-3" style="color: black; margin-top:25px; margin-bottom:25px;" >
					<div class="col-md-12">
						<a href="/entry/edit/{{$entry->id}}"><img src="{{$entry->image_url}}" alt="{{$entry->title}}"></a>
					</div>
						
					<div class="col-md-12" style="color:white;">
						<h4><strong>Title: </strong>{{ucwords(strtolower($entry->title))}}</h4>
						<p><strong>Publish: </strong> {{$entry->created_at->toFormattedDateString()}}</p>
						<p><strong>Last Update: </strong>{{$entry->updated_at->diffForHumans()}}</p>
					</div>
				</div>
			@endif		
		@endforeach
	
	</div>
	<div class="pagination pull-right">{{!!$entries->links()!!}}</div>
@endsection
