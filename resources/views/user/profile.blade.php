@extends('layouts.master')

@section('content')

		<div class="col-md-10 col-md-offset-1" style="background-color:rgba(255,255,255,0.7); ">
			<div class="col-md-12 profile text-center">
				<img src="{{asset('img/user/user.png')}}" alt="user" class="user">
				<h6>{{ucwords(strtolower($user->firstname.' '.$user->lastname))}}</h6>
				<span class="glyphicon glyphicon-heart"></span>
				<h6>{{$user->username}}</h6>
				<h6>{{$user->email}}</h6>
			</div>
		
			<div class="col-md-12" style="margin-top:30px;">
				<table class="table-bordered table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Release Year</th>
							<th>Rating</th>
							<th>Type</th>
							<th>Created</th>
							<th>Last Update</th>
						</tr>
					</thead>
					<tbody>
						@foreach($entry as $entry)
							<tr>
								<td><strong>{{ucwords(strtolower($entry->title))}}</strong></td>
								<td>{{Carbon\Carbon::parse($entry->release_year)->year}}</td>
								<td>{{$entry->rating}}</td>
								<td>{{$entry->entry_type_id->name}}</td>
								<td>{{$entry->created_at->toFormattedDateString()}}</td>
								<td>{{$entry->updated_at->diffForHumans()}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
			
@endsection