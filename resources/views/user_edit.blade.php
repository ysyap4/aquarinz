<!doctype html>
<html>
<head>
    <title>Laravel Form!</title>

    <!-- load bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        body    { padding-bottom:40px; padding-top:40px; }
    </style>
</head>
<body class="container" style="background: #d8d8ff;">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
    </ul>
</nav>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <form method="POST" name="user_edit_process" id="user_edit_process" action="{{ URL::route ('user_edit_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @for ($i=0; $i < sizeof($edit_selected_user); $i++)
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> User Info of ID {{$edit_selected_user[$i]->id}}</h1>
        </div>
            <input type="hidden" name="edit_selected_user[]" value="{{ $edit_selected_user[$i]->id }}">
        <!-- FORM STARTS HERE -->
            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name[]" placeholder="Your Name" value="{{$edit_selected_user[$i]->name}}">
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('email')) has-error @endif">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email[]" placeholder="Your email" value="{{$edit_selected_user[$i]->email}}">
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('password')) has-error @endif">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password[]" placeholder="same or new password" value="">
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('c_password')) has-error @endif">
                <label for="c_password">Confirm Password</label>
                <input type="password" id="password" class="form-control" name="c_password[]" placeholder="confirm same or new password" value="">
                @if ($errors->has('c_password')) <p class="help-block">{{ $errors->first('c_password') }}</p> @endif
            </div>
            @endfor
            </form>
            
            <br>
            <button type="submit" class="btn btn-small btn-info" form="user_edit_process"> Update </button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-small btn-info" href="{{ url('/user_index') }}">Back</a>




        </div>
    </div>

</body>
</html>