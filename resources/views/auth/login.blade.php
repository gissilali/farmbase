@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 style="text-align: center;margin-bottom:20px;font-weight: 700">Sign In</h1>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" class="login-register">
                {{ csrf_field() }}
                
                <div class="panel form-panel">
                    <div class="panel-body" style="padding:20px 50px;">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control form-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control form-input" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="panel-footer" style="padding:0">
                        <button type="submit" class="btn  btn-lg submit-button" style="height: 100%;width:100%;margin:0">
                            Login
                        </button>
                    </div>
                </div>
                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>
                </div>

                
            </form>
        </div>

    </div>
</div>
@endsection
