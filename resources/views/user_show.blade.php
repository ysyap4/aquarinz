<!DOCTYPE html>
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

<div class="jumbotron text-center">
    @for ($i=0; $i < sizeof($show_selected_user); $i++)
    
    <strong><h2>Showing {{$show_selected_user[$i] -> name}}'s information</strong></h2><br>
        
            <div class="container" style="background: #d8d8ff;">
            <strong>Name:</strong></div>
            <strong></strong>{{$show_selected_user[$i] ->name}}<br>

            <div class="container" style="background: #B5BFC0;">
            <strong>Email:</strong></div>
            <strong></strong>{{$show_selected_user[$i] ->email}}<br><br><br><br>
      
      
    @endfor
 </div>
 <a href="{{ URL::route('user_index') }}" class="btn btn-danger">Back</a>
</div>
</body>
</html>