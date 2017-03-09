@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Describe your item
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="{{ url('update_ad/'.$ad->id) }}" enctype="multipart/form-data" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="col-md-2">
								<label for="title">Title</label>
							</div>
							<div class="col-md-10">
								<input type="text" name="title" id="title" class="form-control" value="{{ old('title') or $ad->title }}">
								@if ($errors->has('title'))
									<p class="help-block">{{ $errors->first('title') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="category">Category</label>
							</div>
							<div class="col-md-10">
								<select name="category" id="category" class="form-control">
									@foreach($categories as $category)
										<option value="{{ $category->id }}" class="form-control" @if ($category->id==$ad->category_id)
											selected
										@endif>{{ $category->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('category'))
									<p class="help-block">{{ $errors->first('category') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="description">Description</label>
							</div>
							<div class="col-md-10">
								<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $ad->description }}</textarea>
								@if ($errors->has('description'))
									<p class="help-block">{{ $errors->first('description') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="price">Price</label>
							</div>
							<div class="col-md-10">
								<div class="col-md-5">
									<input type="text" name="price" id="price" class="form-control" value="{{ $ad->price }}">
								</div>
								<div class="col-md-1">
									<input type="checkbox" name="negotiable" id="negotiable" value="true">
								</div>
								<div class="col-md-2">
									<label for="negotiable">Negotiable</label>
								</div>
								@if ($errors->has('price'))
									<div class="col-md-12">
										<p class="help-block">{{ $errors->first('price') }}</p>
									</div>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="image">image</label>
							</div>
							<div class="col-md-10">
								<input type="file" name="image" id="image">
								@if ($errors->has('image'))
									<p class="help-block">{{ $errors->first('image') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="phone">Phone</label>
							</div>
							<div class="col-md-10">
								<input type="text" name="phone" id="phone" class="form-control" accept="integer" value="{{ $ad->phone }}">
								@if ($errors->has('phone'))
									<p class="help-block">{{ $errors->first('phone') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
								<label for="location">Location</label>
							</div>
							<div class="col-md-10">
								<input type="text" name="location" id="location" class="form-control" value="{{ $ad->location }}">
								@if ($errors->has('location'))
									<p class="help-block">{{ $errors->first('location') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<div class="col-md-3">
									<input name="preview_ad" type="submit" value="preview ad" class="btn btn-warning form-control" >
								</div>
								<div class="col-md-3">
									<input name="save_ad" type="submit" value="save ad" class="btn btn-primary form-control" >
								</div>
								<div class="col-md-3">
									<input name="post_ad" type="submit" value="post ad" class="btn btn-success form-control" >
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
	</div>
@endsection