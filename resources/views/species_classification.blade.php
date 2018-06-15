<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Search by Taxonomy Tree</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

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
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Search species by classification</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="ibox-content">

                        <div class="form-group">
                            <form method="POST" action="{{ URL::route('species_dropdown_display_species')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label>Phylum
                                <select name="phylum" class="form-control">
                                    @foreach($phylum_dropdown as $value)
                                    <option value="{{ $value->phylum }}">{{ $value->phylum }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label>Class
                                <select name="class" class="form-control">
                                    @foreach($class_dropdown as $value)
                                    <option value="{{ $value->class }}">{{ $value->class }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label>Family
                                <select name="family" class="form-control">
                                    @foreach($family_dropdown as $value)
                                    <option value="{{ $value->family }}">{{ $value->family }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label>Genus
                                <select name="genus" class="form-control">
                                    @foreach($genus_dropdown as $value)
                                    <option value="{{ $value->genus }}">{{ $value->genus }}</option>
                                    @endforeach
                                </select>
                            </label>
                            
                        </div>

                        <button type="submit" style="color:black;font-family: Arial" class="btn btn-small btn-success"> <i class="glyphicon glyphicon-search"></i> Search </button>

                    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Aquarinz'},
                    {extend: 'pdf', title: 'Aquarinz'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }


        var _alphabetSearch = '';
 
        $.fn.dataTable.ext.search.push( function ( settings, searchData ) {
        if ( ! _alphabetSearch ) {
            return true;
        }
 
        if ( searchData[0].charAt(0) === _alphabetSearch ) {
            return true;
        }
 
        return false;
        } );
 

        $(document).ready(function() {
            var table = $('#allBlogs').DataTable();
 
            var alphabet = $('<div class="alphabet"/>').append('<h5>Search species alphabetically</h5>');
 
            $('<span class="btn btn-info btn-sm"/>')
                .data( 'letter', '' )
                .html( 'ALL' )
                .appendTo( alphabet )
                .after(" ");

            for ( var i=0 ; i<26 ; i++ ) {
                var letter = String.fromCharCode( 65 + i );
 
                $('<span class="btn btn-info btn-sm"/>')
                    .data( 'letter', letter )
                    .html( letter )
                    .appendTo( alphabet )
                    .after(" ");
            }
 
        alphabet.insertBefore( table.table().container() );
 
        alphabet.on( 'click', 'span', function () {
            alphabet.find( '.active' ).removeClass( 'active' );
                $(this).addClass( 'active' );
 
                _alphabetSearch = $(this).data('letter');
                table.draw();
            } );
        } );

    </script>

</body>

</html>
