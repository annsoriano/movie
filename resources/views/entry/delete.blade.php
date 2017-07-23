@extends('layouts.master')

@section('content')
	<div class="container col-md-10 col-md-offset-1">	
		@include('flash::message')
		@foreach($entries as $entry)
			@if($entry->user_id==$user)
				<div class="col-md-3" style="padding-top: 30px;" >
					<div class="col-md-12">
						<div class="col-md-12 text-center image">
							<button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete{{$entry->id}}">Delete</button>
						</div>
						<img src="{{$entry->image_url}}" alt="{{$entry->title}}" class="">
					</div>
						
					<div class="col-md-12">
						<h4><strong>Title: </strong>{{ucwords(strtolower($entry->title))}}</h4>
						<button class="btn btn-danger" style="display:none;" onclick="changemodal()">Delete</button>
					</div>
				</div>
				
				<!-- Modal -->
				<div id="modalDelete{{$entry->id}}" class="modal fade" role="dialog">
					<div class="modalcenter">
						<div class="modal-dialog" >
							
							<div class="modal-content">
								<div class="modal-header" style="background-color:#db3f4d;">
									<button class="close" type="button" data-dismiss="modal">&times;</button>
									<h4>Delete</h4>
								</div>
								<div class="modal-body">
									<h6>Are you sure you want to delete <strong>{{ucwords(strtolower($entry->title))}}</strong>?</h6>
								</div>
								<div class="modal-footer">
									<form action="/entry/delete/{{$entry->id}}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger">Confirm</button>
									<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif		
		@endforeach	

	</div>
	<div class="pagination pull-right"> {{!! $entries->links() !!}} </div>

@endsection