<!DOCTYPE html>

<?php
    use Illuminate\Support\Facades\Input;
    ?>

<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body style="background: #d8d8ff;">
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
    
    </ul>
</nav>


        </div>
    </header>

<div class="container">


<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> User Info</h1>
        </div>

        <!-- FORM STARTS HERE -->
        <form method="POST" action="{{ URL::route ('user_create')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if ($errors ->has ('name')) has-error @endif">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Your Name" value="{{ Input::old('name')}}">
                @if ($errors->has('name'))<p class="help-block">{{$errors ->first('name')}}</p>@endif
            </div>

         <div class="form-group @if ($errors ->has ('email')) has-error @endif">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="Your Email" value="{{ Input::old('email')}}">
                 @if ($errors->has('email'))<p class="help-block">{{$errors ->first('email')}}</p>@endif
            </div>
 
         <div class="form-group @if ($errors ->has ('password')) has-error @endif">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Your Password" value="">
                 @if ($errors->has('password'))<p class="help-block">{{$errors ->first('password')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('c_password')) has-error @endif">
                <label for="c_password">Confirm Password</label>
                <input type="password" id="c_password" class="form-control" name="c_password" placeholder="Confirm Your Password" value="">
                 @if ($errors->has('c_password'))<p class="help-block">{{$errors ->first('c_password')}}</p>@endif
            </div>

            <br>
            <button type="submit" class="btn btn-warning">Add</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ URL::route('user_index') }}">Cancel</a>

        </form>

    </div>
</div>

</div>
</body>
</html>