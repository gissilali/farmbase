@extends('layouts.app')

@section('content')
<div class="container" id="login_registration">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
            <div class="panel form-panel" id="login_form">
                <div class="panel-heading"><h3>Login</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" @submit.prevent="loginValidate">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    

                            <div class="col-md-12">
                                <div class="input-group">
                                    <input tid="email" type="email" class="form-control form-input" name="email" value="{{ old('email') }}" autofocus aria-describedby="basic-addon1" placeholder="Email" v-model="email" @keyup="emailValidate" @blur="emailValidate" autocomplete="off">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.email}"></i></span>
                                </div>
                                <span class="error" v-if="error.email">
                                        @{{ error_message.email }}
                                </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    

                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control form-input" name="password" value="{{ old('email') }}"  autofocus  placeholder="Password" autocomplete="off" v-model="password" @keyup="passwordValidate" @bind="passwordValidate">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.password}"></i></span>
                                </div>
                                <span class="error" v-if="error.password">
                                        @{{ error_message.password }}
                                </span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
