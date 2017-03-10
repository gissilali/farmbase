@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
         <h1 style="text-align: center;margin-bottom:20px;font-weight: 700">Sign Up</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <div class="panel form-panel" style="padding:0">
                        <div class="panel-body" style="padding:50px 50px 50px 50px;">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control form-input" placeholder="Full name" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-input" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-input" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form-input" placeholder="Confirm password" name="password_confirmation" required>
                            </div>
                        </div>
                        </div>
                        <div class="panel-footer" style="padding:0">
                        <button type="submit" class="btn  btn-lg submit-button" style="height: 100%;width:100%;margin:0">
                            Register
                        </button>
                    </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
