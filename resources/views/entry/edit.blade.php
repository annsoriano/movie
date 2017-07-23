@extends('layouts.master')

@section('content')
	

	<div class="col-md-offset-2">
		<form action="/entry/edit/{{$entry->id}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}	
			{{ method_field('PATCH') }}
			<div class="col-md-9 form-group">

				<!-- Title -->
				<div class="form-group col-md-12">
					<input type="text" name="title" class="form-control" value="{{$entry->title}}" required>
				</div>	

				<!-- Year-Rating-Type -->
				<div class="form-group">
					<div class="col-md-6">
						<input type="date" name="release_year" placeholder="Release Date" value="{{date_format(date_create($entry->release_year), 'Y-m-d')}}" class="form-control" required>
					</div>

					<div class="col-md-3">

						<select class="form-control" name="rating" required value="{{$entry->rating}}" id="rating">
							<option selected hidden value="">Rating</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>				
					</div>

					<div class="col-md-3">
						<select class="form-control" name="entry_type_id_id" required id="type">
							<option selected hidden value="">Type</option>
							<option value="1">Movie</option>
							<option value="2">TV Show</option>
						</select>		
					</div>
				</div>

				<!-- Genre -->
				<div class="form-group col-md-12">
					<label for="">Genre:</label>
					<div class="checkbox-group required form-control">
						<label for="" class="checkbox-inline"><input type="checkbox" name="genre['Comedy']" value="1">Comedy</label>
						<label for="" class="checkbox-inline"><input type="checkbox" name="genre['Horror']" value="3">Horror</label>
						<label for="" class="checkbox-inline"><input type="checkbox" name="genre['action']" value="2">Action</label>
					</div>
					
				</div>

				<!-- Synopsis -->
				<div class="form-group col-md-12">
					<div>
						<textarea class="form-control" rows="12" name="synopsis" required>{{$entry->synopsis}}</textarea>
					</div>
				</div>
				<!-- Photo -->
				<div class="form-group col-md-12">
					<div class="col-md-10" style="padding-left:80px;">
						<label>Image</label>
						<input type="file" name="img" class="form-control">
					</div>
				</div>

				<div class="form-group col-md-12">
					<button class="btn btn-primary" type="submit" name="submit" style="width:20%; display:block; margin:0 auto; ">Publish</button>
				</div>


						
			</div>
		</form>	
	</div>

<script>
	document.getElementById('rating').selectedIndex= {{$entry->rating}};
	document.getElementById('type').selectedIndex= {{$entry->entry_type_id_id}};
</script>
@endsection