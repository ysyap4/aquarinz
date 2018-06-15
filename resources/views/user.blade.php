<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/slick/slick.css" rel="stylesheet">
    <link href="css/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

  
<div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{ Auth::user()->name }}</strong>
                       <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        AQ+
                    </div>
                <li>
                    <a href="{{ URL::route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> </a>
                </li>
                <li>
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Administration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ URL::route('user_index') }}">User</a></li>
                        <li><a href="{{ URL::route('species_index') }}">Species</a></li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Search species</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ URL::route('species_scientific_name') }}">By scientific name</a></li>
                        <li><a href="{{ URL::route('species_classification') }}">By taxonomy tree</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ URL::route('graph') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Chart</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ URL::route('graph') }}">Phylum</a></li>
                        <li><a href="{{ URL::route('graph_class') }}">Class</a></li>
                        <li><a href="{{ URL::route('graph_family') }}">Family</a></li>
                        <li><a href="{{ URL::route('graph_genus') }}">Genus</a></li>
                        <li><a href="{{ URL::route('graph_size') }}">Size</a></li>
                        <li><a href="{{ URL::route('graph_habitat') }}">Habitat</a></li>
                    </ul>
                    </li>
                </li>
      </div>
    </nav>
       <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                         <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                        </form>
                    </li>
                </ul>

            </nav>
        </div>

        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="ibox">

                        <h4 class="text-center m">
                            Wellcome! This is Aquarinz homepage
                        </h4>
                        <div class="slick_demo_1">

                            <div>
                                <div class="ibox-content">
                                    <h2>Aquarinz | Marine Biodiversity Database</h2>
                                    <p>
                                        This Aquarinz provide marine biodiversity database for living thing in the sea.
                                        Many information of each species including physical detail, habitat, every 
                                        classification and so on. Aquarinz also provide detail for the classification 
                                        of the living things start from its family until its species.
                                    </p>
                                </div>
                                <div>
                                    <img class="col-xs-12" position="center" src="img/50.jpg" class="thumb" alt="a picture">
                                </div>
                            </div>
                            <div>
                                <div class="ibox-content">
                                    <h2>Aquarinz | Classification and Taxanomy Database</h2>
                                    <p>
                                        This Aquarinz provide marine biodiversity database for living thing in the sea.
                                        Many information of each species including physical detail, habitat, every 
                                        classification and so on. Aquarinz also provide detail for the classification 
                                        of the living things start from its family until its species.
                                    </p>
                                </div>
                                <div>
                                    <img class="col-xs-12" position="center" src="img/111.jpg" class="thumb" alt="a picture">
                                </div>
                            </div>
                            <div>
                                <div class="ibox-content">
                                    <h2>Aquarinz | Marine Information</h2>
                                    <p>
                                        his Aquarinz provide marine biodiversity database for living thing in the sea.
                                        Many information of each species including physical detail, habitat, every 
                                        classification and so on. Aquarinz also provide detail for the classification 
                                        of the living things start from its family until its species.
                                    </p>
                                </div>
                                <div>
                                    <img class="col-xs-12" position="center" src="img/100.jpg" class="thumb" alt="a picture">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">


                    <h4 class="text-center m">
                        All these are the featured species, have a look.
                    </h4>



                    <div class="slick_demo_2">

                        <div>
                            <div class="ibox-content">
                                <h2>FEATURED SPECIES 1</h2>
                                <p>
                                    <br><b>Sepia Latimanus</b></br>
                                    Sepia latimanus, (broadclub cuttlefish), 
                                    is widely distributed from the Andaman Sea, east to Fiji, 
                                    and south to northern Australia. It is the most common 
                                    cuttlefish species on coral reefs. Commonly they are light brown or yellowish 
                                    with white mottled markings. 
                                </p>
                            </div>
                                 <div>
                                    <img class="col-lg-12 " src="img/12.jpg" class="thumb" alt="a picture">
                                </div>
                        </div>
                        <div>
                            <div class="ibox-content">
                                <h2>FEATURED SPECIES 2</h2>
                                <p>
                                    <b><br>Holothuria Atra</br></b>
                                    Holothuria atra, commonly known as the black sea cucumber or lollyfish, 
                                    is a species of marine invertebrate in the family Holothuriidae. It was 
                                    placed in the subgenus Halodeima by Pearson in 1914, making its full 
                                    scientific name Holothuria (Halodeima) atra. 
                                </p>
                            </div>
                             <div>
                                <img class="col-lg-12" src="img/13.jpg" class="thumb" alt="a picture">
                             </div>
                        </div>
                        <div>
                            <div class="ibox-content">
                                <h2>FEATURED SPECIES 3</h2>
                                <p>
                                    <b><br>Goniobranchus Kuniei</br></b>
                                    Goniobranchus kuniei is a species of very colourful sea slug, 
                                    a marine gastropod mollusc in the family Chromodorididae. It has a pattern of 
                                    blue spots with pale blue haloes on a creamy mantle. There is a double border 
                                    to the mantle of purple and blue.
                                </p>
                            </div>
                             <div>
                                <img class="col-lg-12 " src="img/14.jpg" class="thumb" alt="a picture">
                             </div>
                        </div>
                        <div>
                            <div class="ibox-content">
                                <h2>FEATURED SPECIES 4</h2>
                                <p>
                                     <b><br>Linckia Laevigata</br></b>
                                    Linckia laevigata (sometimes called the "blue Linckia" or blue star) is a species 
                                    of sea star (commonly known as a starfish) in the shallow waters of tropical Indo-Pacific
                                    (a biogeographic region of the Earth's seas, comprising the tropical waters of the Indian 
                                    Ocean).
                                </p>
                            </div>
                             <div>
                                <img class="col-lg-12 " src="img/17.jpg" class="thumb" alt="a picture">
                             </div>
                        </div>
                    </div>
                </div>
                </div>
     


        </div>
        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- slick carousel-->
    <script src="js/plugins/slick/slick.min.js"></script>

    <!-- Additional style only for demo purpose -->
    <style>
        .slick_demo_2 .ibox-content {
            margin: 0 10px;
        }
    </style>

    <script>
        $(document).ready(function(){


            $('.slick_demo_1').slick({
                dots: true
            });

            $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick_demo_3').slick({
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
            });
        });


    </script>

</body>

</html>