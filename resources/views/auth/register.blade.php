@<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .body{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background-image: url(img/2.jpg);
                background-size: cover;
                z-index: 0;
                }
    </style>

</head>

<body class="body">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                 <br></br>
            <br></br>
                <img src="img/3.png" width="280" height="180">
            </div>

            <h3 style="color: white">Welcome to Aquarinz</h3>

                    <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        
                            <link rel="stylesheet" href="build/css/intlTelInput.css">
                                <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="phone" value="{{ old('phone') }}" style="height: 25px;width: 285px;" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                            <script src="build/js/intlTelInput.js"></script>
                            <script type="text/javascript">$("#phone").intlTelInput({
                                    allowDropdown: true,
                                    nationalMode: false,
                                    separateDialCode: false,
                                    utilsScript:"build/js/utils.js"});;</script>
                            <script type="text/javascript">$("#phone").intlTelInput("getNumber");</script>
                        </div>

                        <br></br>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                            <div class="col-md-6" style="padding-top: 8px;">
                                {!! app('captcha')->display(['data-theme' => 'dark']); !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                                 <script src='https://www.google.com/recaptcha/api.js'></script>
                        </div>

                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <br></br>
                    <br></br>
                    <br></br>

                                <button type="submit" class="btn btn-primary block full-width m-b">
                                    Register
                                </button>
                                <a class="btn btn-sm btn-danger btn-block"  href="{{ url('/login') }}">Back to login</a>
                       
                    </form>
        </div>
    </div>

   <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="build/js/intlTelInput.min.js"></script>
</body>

</html>
