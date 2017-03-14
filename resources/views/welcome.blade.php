@extends('layouts.app')
@section('content')
    <section class="main-banner">
        <div class="container container-custom">
            <div class="center-box">
                <h1 class="title">Farmbase</h1>
                <h4 class="sub-title">i need a really cool line here...</h4>
                <p>Farmbase is a web based service aimed at making agricultural ads easier to manage it kinda like olx for farmers</p>
                <a href="" class="button rounded border-white">Get Started (create ad)</a>
                <div style="font-size:24px;padding-top:20px;">
                    <h3>Browse</h3>
                    <a href="#"><i class="fa fa-arrow-down" style="color:white"></i></a>
                </div>
            </div>
        </div>
    </section>
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
@endsection