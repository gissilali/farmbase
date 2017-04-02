<template>
<div class="container" id="login_registration">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
            <div class="panel form-panel" id="login_form">
                <div class="panel-heading"><h3>Login</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    

                            <div class="col-md-12">
                                <div class="input-group">
                                    <input tid="email" type="email" class="form-control form-input" name="email" value="{{ old('email') }}" aria-describedby="basic-addon1" placeholder="Email" v-model="email" @keyup="emailValidate" @blur="emailValidate" autocomplete="off" @keyup="loginValidate">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.email}"></i></span>
                                </div>
                                <span class="error" v-if="error.email">
                                        @{{ error_message.email }}
                                </span>
                                @if ($errors->has('email'))
                                    <span class="error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    

                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control form-input" name="password" value="{{ old('email') }}"  autofocus  placeholder="Password" autocomplete="off" v-model="password" @keyup="passwordValidate" @bind="passwordValidate" @keyup="loginValidate">
                                    <span class="input-group-addon input-group-addon-custom" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    <span class="input-group-addon input-group-addon-custom check"><i class="fa fa-check" :class="{'confirmed':validated.password}"></i></span>
                                </div>
                                <span class="error" v-if="error.password">
                                        @{{ error_message.password }}
                                </span>
                                @if ($errors->has('password'))
                                    <span class="error">
                                        {{ $errors->first('password') }}
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
                                <button type="submit" class="button rounded small" id="submit" :disabled="loginValidate">
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                password:"",
                email:"",

                error:{

                email:false,
                password:false,

                },
                error_message:{

                password:"",
                email:"",

                },
                validated:{

                    email:false,
                    password:false,
                }
            }
        },
        methods:{

          emailValidate(){

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
                if(login.email.trim()==0){

                this.validated.email=false;

                this.error.email=true;

                this.error_message.email="email is required"
                }
                else if (!re.test(this.email)){
                  this.error.email=true;

                    this.error_message.email="Email is invalid";

                    this.validated.email=false;
                }else{
              
                this.error.email=false;

                this.error_message.email="";

                this.validated.email=true;
                
                }
            },

            passwordValidate(){

                if(this.password==""){

                  this.error.password=true;

                  this.error_message.password="Please fill out this field";

                  this.validated.password=false;

                }
                else if(this.password.length>0){

                  this.error.password=false;

                  this.error_message.password="";

                  this.validated.password=true;
                }
          },
        },
}
</script>
