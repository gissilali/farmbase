@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-6">
           @if ($ad->image_url==NULL)
           	<div class="image-wrap" style="height:250px;background: grey">
           		<span class="category label">farm produce</span>
           		<div class="no-image" style="text-align: center;padding-top:40px">
           			<i class="fa fa-image"></i>
                    <h4>no image available</h4>
                </div>
           </div>
           @else
           	<div class="image-wrap" style="height:250px;background:url({{ '../'.$ad->image_url }});background-size:cover;border:1px solid rgba(0,0,0,0.1)">
           		<span class="category label">{{ App\Category::find($ad->category_id)->name }}</span>
           </div>
           @endif
           <div class="actions" style="margin-bottom:20px;">
           		<a href="" class="button small call">call</a>
           		<a href="" class="button small message">message</a>
           </div>
       </div>
       <div class="col-lg-6 col-md-8 col-sm-6">
			<div class="item-info">
				<div class="row">
					<p class="title">{{ $ad->title }}</p>
				</div>
				<div class="row">
					<p class="price">KES 3000</p>
					@if ($ad->negotiable)
						<span class="negotiable label">negotiable</span>
					@endif

				</div>
				<div class="row">
					<p class="product-description">
						{{ $ad->description }}
					</p>
				</div>
				<div class="row">
					<div class="actions" id="favorite" data-ad-id="{{ $ad->id}}">
						<p class="author"><i class="fa fa-user"></i>{{ App\User::find($ad->user_id)->name }}</p>
						<p class="location"><i class="fa fa-map-marker"></i>{{ $ad->location }}</p>
                        <button class="fa fa-star favorite" :class="{'favorite-true':this.favorite}" @click="like('{{ $ad->id }}')"><a href="{{ url('favorite/'+$ad->id) }}"></a></button>
					</div>
				</div>
			</div>
       </div>
    </div>
</div>
@include('item_grid')
@endsection
