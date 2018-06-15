<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Login</title>

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
                background-image: url(img/1.jpg);
                background-size: cover;
                z-index: 0;
                }
    </style>

</head>

<body class="body">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <br></br>
            <br></br>
            <br></br>
            <br></br>

            <div>
                <img src="img/3.png" width="280" height="180">
            </div>
            <h3 style="color: black">Welcome to Aquarinz</h3>
            
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">            

                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                </div>

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
                
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#" style="color:white" href="{{ url('/password/reset') }}">Forgot password?</a>
                <p class="text-muted text-center" style="color: #DAF7A6">Do not have an account?</p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Create an account</a>
            </form>
          
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
