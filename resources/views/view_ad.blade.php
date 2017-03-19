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
           	<div class="image-wrap" style="height:250px;background:url({{ '../'.$ad->image_url }});background-size:cover;">
           		<span class="category label">{{ App\Category::find($ad->category_id)->name }}</span>
           </div>
           @endif
           <div class="actions" style="margin-bottom:20px;">
           		<a href="" class="btn call">call</a>
           		<a href="" class="btn message">message</a>
           </div>
       </div>
       <div class="col-lg-6 col-md-8 col-sm-6">
			<div class="item-info">
				<div class="row">
					<p class="title">Beetroot Juice</p>
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
					<div class="actions">
						<p class="author"><i class="fa fa-user"></i>Kill Bill</p>
						<p class="location"><i class="fa fa-map-marker"></i>Kisumu</p>
                        <button class="fa fa-star favorite"></button>
					</div>
				</div>
			</div>
       </div>
    </div>
</div>
<div class="item-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="categories-panel clearfix">
                    <div class="container">
                        <ul class="tabs">
                            <li class="current"><a href="">farm produce</a></li>
                            <li><a href="">farm implements</a></li>
                            <li><a href="">other stuff</a></li>
                            <li><a href="">top ten</a></li>
                            <li><a href="">crap show</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <div class="panel item">
                       <div class="panel-heading image" style="background:#d8d8d8;background-size:cover;height:250px;">
                            <div class="no-image"><i class="fa fa-image"></i>
                                <h4>no image available</h4>
                            </div>
                           <span class="category label">Farm Produce</span>
                       </div>
                       <div class="panel-body">
                            <h4 class="title">Kill Bill</h4>
                            <div class="item-info">
                                <p class="location"><i class="fa fa-map-marker"></i>Kisumu</p>
                                <p class="price">3000 KES</p>
                            </div>

                       </div>
                       <div class="panel-footer">
                           <p class="author"><i class="fa fa-user"></i>Kill Bill</p>
                           <button class="fa fa-star favorite"></button>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

@endsection
