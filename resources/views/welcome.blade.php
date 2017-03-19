@extends('layouts.app')
@section('content')
    <div id="welcome">
        <section class="main-banner">
        <div class="container container-custom">
            <div class="center-box">
                <h1 class="title">Farmbase</h1>
                <h4 class="sub-title">i need a really cool line here...</h4>
                <p>Farmbase is a web based service aimed at making agricultural ads easier to manage it kinda like olx for farmers</p>
                <p>Get Started</p>
                <a href="" class="btn cta-get-started btn-lg">create your ad now</a>
                <div style="font-size:24px;padding-top:25vh;text-align: center;">
                    <h3>Browse</h3>
                    <a href="#"><i class="fa fa-arrow-down" style="color:white"></i></a>
                </div>
            </div>
        </div>
    </section>
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
    </div>
@endsection
