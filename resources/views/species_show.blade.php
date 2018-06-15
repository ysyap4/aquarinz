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
   @for ($i=0; $i < sizeof($show_selected_species); $i++)

        
         <h2>Displaying {{$show_selected_species[$i] ->species_name}}'s information</h2>
        <p>
            <div class="container" style="background: #d8d8ff;">
                <strong>Species Name:</strong>{{$show_selected_species[$i] ->species_name}}<br></div> 

            <strong>Phylum:</strong>{{$show_selected_species[$i] ->phylum}}<br>
            
            <div class="container" style="background: #B5BFC0;">
                <strong>Class:</strong>{{$show_selected_species[$i] ->class}}<br></div>

            <strong>Family:</strong>{{$show_selected_species[$i] ->family}}<br>

            <div class="container" style="background: #d8d8ff;">
                <strong>Genus:</strong>{{$show_selected_species[$i] ->genus}}<br></div>

            <strong>Common Name:</strong>{{$show_selected_species[$i] ->common_name}}<br>

            <div class="container" style="background: #B5BFC0;">
                <strong>Size:</strong>{{$show_selected_species[$i] ->size}}<br></div>

            <strong>Habitat:</strong>{{$show_selected_species[$i] ->habitat}}<br>

            <div class="container" style="background: #d8d8ff;">
                <strong>Life History:</strong>{{$show_selected_species[$i] ->life_history}}<br></div><br><br>
        </p>
        
    @endfor
</div>
        

    </div>
 <a href="{{ URL::route('species_index') }}" class="btn btn-danger">Back</a>
</div>
</body>
</html>