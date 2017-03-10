@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-md-4">
			<div class="panel" style="height:250px;background({{ '../'.$ad->image_url }})">
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>{{ $ad->title }}</h4>
				</div>
				<div class="panel-body">
					<p>{{ $ad->description }}</p>
				</div>
				<div class="panel-footer">
					@if ($ad->user_id==Auth::user()->id)	
						<form action="{{ url('delete/'.$ad->id) }}" method="post">
							{{ csrf_field() }}
							<input type="submit" value="delete" class="btn btn-danger">
						</form>
						<form action="{{ url('edit/'.$ad->id) }}" method="post">
							{{ csrf_field() }}
							<input type="submit" value="edit ad" class="btn btn-primary">
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection