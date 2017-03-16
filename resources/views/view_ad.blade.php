@extends('layouts.app')
@section('content')
	<div class="container" id="app">
		<div class="row">
			@{{ name }}
					<div class="col-md-4">
						@if ($ad->image_url==NULL)	
							<div class="panel-heading image-wrap" style="background:#dfdfdf;background-size:cover;height:300px;text-align:center">
                                <span class="label">KES {{ $ad->price }}</span>
                                <i class="fa fa-image" style="font-size:24px"></i>
                                <h4>no image available</h4>

                                </div>
						@else
							<div class="image-wrap" style="height:300px;background:url({{ '../'.$ad->image_url}});background-size:cover;"></div>
						@endif
					</div>
					<div class="col-md-6">
						<div class="panel " style="min-height: 300px;position:relative;box-shadow:none;">
							<div class="panel-heading">
								<h4 class="title">{{ $ad->title }}</h4>
							</div>
							<div class="panel-body">
								<p class="description">{{ $ad->description }}</p>
								<div class="info">
									<p class="location" style="float:left"><strong>location:</strong>{{ $ad->location }}</p>
									<p class="author" style="float:right"><strong>posted by:</strong>{{ App\User::find($ad->user_id)->name }}</p>
								</div>
							</div>
							<div class="panel-footer" style="position:absolute;bottom:0;width:100%;background:#fff">
								<nav style="float:left">
									<a href="#" class="button">call</a>
									<a href="#" class="button">message</a>
								</nav>
								@if (Auth::check())
									@if (App\Favorite::whereUserId(Auth::user()->id)->whereAdId($ad->id)->first())
										<button class="btn favorite" href="{{ $ad->id }}" @click.prevent="sendRequest($event)"><i class="fa fa-star" id="favorite" data-ad-id="{{ $ad->id }}"></i></button>
									@else
										<button class="btn favorite" href="{{ $ad->id }}" @click.prevent="sendRequest($event)" id="favorite" data-ad-id="{{ $ad->id }}"><i class="fa fa-star"></i></button>
									@endif
								@endif
							</div>
						</div>
					</div>
		</div>
		<div class="row">
			<div class="item-grid">
		        <div class="container">
		            <div class="row">
		                <div class="categories-panel">
		                    <ul class="tabs">
		                        <li class="current"><a href="">farm produce</a></li>
		                        <li><a href="">farm implements</a></li>
		                        <li><a href="">other stuff</a></li>
		                        <li><a href="">top ten</a></li>
		                        <li><a href="">crap show</a></li>
		                    </ul>
		                </div>
		            </div>
		            @foreach ($ads->chunk(4) as $row)
		                <div class="row">
		                @foreach ($row as $ad) 
		                    <div class="col-md-3 col-sm-6">
		                        <div class="panel item-panel" style="margin-bottom:25px;border:1px solid rgba(0,0,0,0.12);overflow:auto;min-height: 355px;position:relative">
		                            @if ($ad->image_url==NULL)
		                                <div class="panel-heading image-wrap" style="background:#dfdfdf;background-size:cover;height:200px;text-align:center">
		                                <span class="label">KES {{ $ad->price }}</span>
		                                <i class="fa fa-image" style="font-size:24px"></i>
		                                <h4>no image available</h4>

		                                </div>
		                            @else
		                                <div class="panel-heading image-wrap" style="background:url({{ '../'.$ad->image_url }});background-size:cover;height:200px;">
		                                <span class="label">KES {{ $ad->price }}</span>
		                                </div>
		                            @endif
		                            <div class="panel-body" style="padding:10px;margin:0;padding-left:5px;">
		                                <p class="title">{{ $ad->title }}</p>
		                                <p class="location">{{ $ad->location }}</p>
		                                
		                            </div>
		                            <div class="panel-footer" style="position:absolute;overflow:auto;bottom:0;width:100%">
		                                <a href="{{ url('ad/'.$ad->id) }}" class="button small view-more">view more</a>
		                                @if (Auth::check())
		                                    <div class="btn favorite"><i class="fa fa-star"></i></div>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
		                @endforeach
		                </div>
		            @endforeach
		                {{ $ads->links() }}
	            </div>
        </div>
    </div>
		</div>
	</div>
@endsection