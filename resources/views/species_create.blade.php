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
                <label for="name">Species Name</label>
                <input type="text" id="species_name" class="form-control" name="name" placeholder="Your Name" value="">
                @if ($errors->has('name'))<p class="help-block">{{$errors ->first('name')}}</p>@endif
            </div>

         <div class="form-group @if ($errors ->has ('phylum')) has-error @endif">
                <label for="phylum">Phylum</label>
                <input type="text" id="phylum" class="form-control" name="phylum" placeholder="Your Email" value="">
                 @if ($errors->has('phylum'))<p class="help-block">{{$errors ->first('phylum')}}</p>@endif
            </div>

          <div class="form-group @if ($errors ->has ('class')) has-error @endif">
                <label for="class">Class</label>
                <input type="class" id="class" class="form-control" name="class" placeholder="Your class" value="">
                 @if ($errors->has('class'))<p class="help-block">{{$errors ->first('class')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('family')) has-error @endif">
                <label for="family">Family</label>
                <input type="family" id="family" class="form-control" name="family" placeholder="Your family" value="">
                 @if ($errors->has('family'))<p class="help-block">{{$errors ->first('family')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('genus')) has-error @endif">
                <label for="genus">Genus</label>
                <input type="genus" id="genus" class="form-control" name="genus" placeholder="Your genus" value="">
                 @if ($errors->has('genus'))<p class="help-block">{{$errors ->first('genus')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('family')) has-error @endif">
                <label for="family">Family</label>
                <input type="family" id="family" class="form-control" name="family" placeholder="Confirm Your family" value="">
                 @if ($errors->has('family'))<p class="help-block">{{$errors ->first('family')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('common_name')) has-error @endif">
                <label for="common_name">Common Name</label>
                <input type="common_name" id="common_name" class="form-control" name="common_name" placeholder="Your family" value="">
                 @if ($errors->has('common_name'))<p class="help-block">{{$errors ->first('common_name')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('size')) has-error @endif">
                <label for="size">Size</label>
                <input type="size" id="size" class="form-control" name="size" placeholder="Your size" value="">
                 @if ($errors->has('size'))<p class="help-block">{{$errors ->first('size')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('habitat')) has-error @endif">
                <label for="habitat">Habitat</label>
                <input type="habitat" id="habitat" class="form-control" name="habitat" placeholder="Your habitat" value="">
                 @if ($errors->has('habitat'))<p class="help-block">{{$errors ->first('habitat')}}</p>@endif
            </div>

             <div class="form-group @if ($errors ->has ('life_history')) has-error @endif">
                <label for="life_history">Life History</label>
                <input type="life_history" id="life_history" class="form-control" name="life_history" placeholder="Your life_history" value="">
                 @if ($errors->has('life_history'))<p class="help-block">{{$errors ->first('life_history')}}</p>@endif
            </div>
            
            <br>
            <button type="submit" class="btn btn-warning">Add</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ URL::route('user_index') }}">Cancel</a>

        </form>

    </div>
</div>

</div>
</body>
</html>p