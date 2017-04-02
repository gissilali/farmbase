@extends('layouts.app')

@section('content')
<div class="container" id="dashboard">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel  my-ads">
                <p class="panel-title">My Ads</p>
                <div class="panel-heading clearfix">
                    <a href="{{ url('create_ad') }}" class="button small create-ad">create ad</a>
                </div>
                <div class="panel-body">
                    @if (count($user_ads)<=0)
                        <div class="no-ads" style="padding:10px;background:#F6F8FA;border:1px solid #DEE3E9;border-radius:3px;">
                            You have not placed any ads yet <a href="{{ url('create_ad') }}">create ad now</a>
                        </div>
                    @else
                        @foreach ($user_ads as $ad)
                            <div class="ad-list-item clearfix" style="border-bottom:solid 1px rgba(0,0,0,0.2);">
                                <p class="ad-title">{{ $ad->title }}</p>
                                <small class="date-published">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($ad->created_at))->diffForHumans() }}</small>
                                <p class="label favorite">{{ count(App\Favorite::whereAdId($ad->id)->get()) }} @if (count(App\Favorite::whereAdId($ad->id)->get())==1)
                                    favorite
                                @else
                                    favorites
                                @endif</p>
                                <a href="{{ url('edit/'.$ad->id) }}" class="button small edit">edit</a>
                                <form action="{{ url('delete/'.$ad->id) }}" method="post" style="float:right">
                                    {{ csrf_field() }}
                                    <input  type="submit" class="button small delete" value="delete" style="display: inline">
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default my-favorites">
                <div class="panel-heading clearfix"><p class="panel-title" style="float: left">Your favorites</p></div>

                <div class="panel-body">
                    @if (count($favorites)<=0)
                        <div class="no-ads">
                            You have no favorite ads
                        </div>
                    @else
                        @foreach ($favorites as $favorite)
                            <div class="ad-list-item" style="border-bottom:solid 1px rgba(0,0,0,0.2);">
                                <a class="favorite-title" href="{{ url('ad/'.$favorite->id) }}">{{ $favorite->title }}</a>
                                <small class="favorite-author">{{ App\User::find($favorite->user_id)->name}}</small>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
