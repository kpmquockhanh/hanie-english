
<!doctype html>
<html class="no-js" lang="">

<head>
    @include('admin.layouts.style')
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Login Register area Start-->
<div class="login-content">
    <!-- Login -->
    <div class="nk-block {{ old('auth_type') == 'log' || !old('auth_type') ? 'toggled':'' }}" id="l-login">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="nk-form">
                @if ($errors->first() && old('auth_type') == 'log')
                    <div class="input-group mg-b-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-alarm"></i></span>

                        <div class="alert alert-danger alert-mg-b-0" role="alert" style="padding: 5px;">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="fm-checkbox">
                    <label>
                        <input type="checkbox" class="i-checks" name="remember"> <i></i> Keep me signed in
                    </label>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success notika-btn-success waves-effect">Login</button>
                </div>
                    <input type="text" value="log" name="auth_type" hidden>

                    <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float">
                    <i class="notika-icon notika-right-arrow right-arrow-ant"></i>
                </a>
            </div>
        </form>

        <div class="nk-navigation nk-lg-ic">
            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
        </div>
    </div>

    <!-- Register -->
    <div class="nk-block {{ old('auth_type') == 'reg'? 'toggled':'' }}" id="l-register">
        <div class="nk-form">
            <form action="{{ route('register') }}" method="post">
                @csrf
                @if ($errors->first() && old('auth_type') == 'reg')
                    <div class="input-group mg-b-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-alarm"></i></span>

                        <div class="alert alert-danger alert-mg-b-0" role="alert" style="padding: 5px;">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-app"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                    </div>
                </div>

                <input type="text" value="reg" name="auth_type" hidden>
                <div class="">
                    <button type="submit" class="btn btn-success notika-btn-success waves-effect mg-t-15">Register</button>
                </div>
            </form>
            <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
        </div>

        <div class="nk-navigation rg-ic-stl">
            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
            <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
        </div>
    </div>

    <!-- Forgot Password -->
    <div class="nk-block" id="l-forget-password">
        <div class="nk-form">
            <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="input-group">
                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                <div class="nk-int-st">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>

            <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
        </div>

        <div class="nk-navigation nk-lg-ic rg-ic-stl">
            <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
            <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
        </div>
    </div>
</div>
<!-- Login Register area End-->

@include('admin.layouts.footer')
</body>

</html>