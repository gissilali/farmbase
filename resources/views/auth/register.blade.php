@extends('layouts.app')

@section('content')
<div class="container" id="login_registration">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
            <div class="panel form-panel" id="registration_form">
                <div class="panel-heading"><h3>Sign Up</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="name" type="name" class="form-control form-input" name="name" value="{{ old('email') }}" required autofocus aria-describedby="basic-addon1" placeholder="Name" v-model="name" @keyup="nameValidate(name)" @blur="nameValidate(name)" autocomplete="off">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.name}"></i></span>
                                </div>
                                <span class="error" v-if="error.name">
                                        @{{ error_message.name }}
                                </span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control form-input" name="email" value="{{ old('email') }}" required autofocus aria-describedby="basic-addon1" placeholder="Email" v-model="email" @keyup="emailConfirmation(email)" autocomplete="off" @blur="emailConfirmation(email)">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check"  :class="{'confirmed':validated.email}"></i></span>
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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control form-input" name="password" value="{{ old('email') }}" required autofocus aria-describedby="basic-addon1" placeholder="Password" v-model="password" @keyup="passwordValidate(password)" autocomplete="off" @blur="passwordValidate(password)">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.password}"></i></span>
                                </div>
                                <span class="error" :class="{'error':error}" v-if="error.password">
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
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control form-input" name="password_confirmation" required autofocus aria-describedby="basic-addon1" placeholder="Confirm Password" v-model="password_confirmation" @keyup="passwordConfirmation(password,password_confirmation)" @blur="passwordConfirmation(password,password_confirmation)" autocomplete="off">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check"  :class="{'confirmed':validated.password_confirmation}"></i></span>
                                </div>
                            </div>
                        </div>
                        <span class="error" v-if="error.password_confirmation">
                                        @{{ error_message.password_confirmation }}
                                </span>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <p>Already have an account? <strong><a class="btn btn-link" href="{{ url('login') }}">Login
                                </a></strong></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
