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
                <a href="{{ url('create_ad') }}" class="btn cta-get-started btn-lg">create your ad now</a>
                <div style="font-size:24px;padding-top:25vh;text-align: center;">
                    <h3>Browse</h3>
                    <a href="#"><i class="fa fa-arrow-down" style="color:white"></i></a>
                </div>
            </div>
        </div>
    </section>
    @include('item_grid')
    </div>
@endsection
