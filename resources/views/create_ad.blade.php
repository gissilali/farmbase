@extends('layouts.app')
@section('content')
	<div class="container" id="create-ad">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel">
            	<div class="panel-heading">
            		<h1 style="text-align: center;font-weight:400">Create Ad</h1>
		    		<p style="text-align: center;margin-bottom:20px;">Describe your product</p>
            	</div>
				<div class="panel-body form-panel">
					<form class="form-horizontal" action="{{ url('post_ad') }}" enctype="multipart/form-data" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="col-md-12">
								<label for="title">Title</label>
							</div>
							<div class="col-md-12">
								<input type="text" name="title" id="title" class="form-control form-input" value="{{ old('title') }}">
								@if ($errors->has('title'))
									<p class="help-block error">{{ $errors->first('title') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="category">Category</label>
							</div>
							<div class="col-md-12">
								<select name="category" id="category" class="form-control form-input">
									<option value="">--SELECT CATEGORY--</option>}
									option
									@foreach($categories as $category)
										<option value="{{ $category->id }}" class="form-control">{{ $category->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('category'))
									<p class="help-block error">{{ $errors->first('category') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="description" class="form-control-label">Description</label>
							</div>
							<div class="col-md-12">
								<textarea name="description" id="description" cols="30" rows="10" class="form-control form-textarea">{{ old('description') }}</textarea>
								@if ($errors->has('description'))
									<p class="help-block error">{{ $errors->first('description') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="price">Price</label>
							</div>
							<div class="col-md-12">
								<div class="col-md-5">
									<input type="text" name="price" id="price" class="form-control form-input" value="{{ old('price')}}">
								</div>
								<div class="col-md-1">
									<input type="checkbox" name="negotiable" id="negotiable" value="true" @if (old('negotiable')==true)
										checked 
									@endif>
								</div>
								<div class="col-md-6">
									<label for="negotiable">Negotiable</label>
								</div>
								@if ($errors->has('price'))
									<div class="col-md-12">
										<p class="help-block error">{{ $errors->first('price') }}</p>
									</div>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="image">image</label>
							</div>
							<div class="col-md-12">
								<input type="file" name="image" id="image">
								@if ($errors->has('image'))
									<p class="help-block error">{{ $errors->first('image') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
								<div class="col-md-12">
									<label for="phone">Phone</label>
								</div>
								<div class="col-md-12">
									<input type="text" name="phone" id="phone" class="form-control form-input" accept="integer" value="{{ old('phone') }}">
									@if ($errors->has('phone'))
										<p class="help-block error">{{ $errors->first('phone') }}</p>
									@endif
								</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="location">Location</label>
							</div>
							<div class="col-md-12">
								<input type="text" name="location" id="location" class="form-control form-input" value="{{ old('location') }}">
								@if ($errors->has('location'))
									<p class="help-block error">{{ $errors->first('location') }}</p>
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<input type="submit" value="create ad" class="btn btn-small btn-primary">
							</div>
						</div>
					</form>
				</div>
            </div>
		</div>
	</div>
@endsection