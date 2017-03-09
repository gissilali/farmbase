@extends('layouts.app')
@section('content')
	<div class="container">
		@if (Auth::check())
		 	<a href="{{ url('delete/'.$ad->id) }}" class="btn btn-danger">delete</a>
		 	<a href="{{ url('update_ad/'.$ad->id) }}" class="btn btn-success">update</a>
		@endif
	</div>
@endsection