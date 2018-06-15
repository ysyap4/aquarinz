<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Administration</title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

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
                    <a href="{{ URL::route('user_index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Administration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ URL::route('user_index') }}">User</a></li>
                        <li><a href="dashboard_2.html">Species</a></li>
                        <li><a href="dashboard_3.html">Class</a></li>
                    </ul>
            </li>
                        <li>
                    <a href="{{ URL::route('species_scientific_name') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Search Species</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ URL::route('species_scientific_name') }}">By scientific name</a></li>
                        <li><a href="{{ URL::route('species_classification') }}">By classification</a></li>
                    </ul>
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
                        <h5>Search species by </h5>
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

                    <div class="table-responsive">
                    <table id="allBlogs" class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">Scientific Name (picture)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($classification_species as $value)
                        <tr style="text-align: center;">
                            <td>{{ $value->scientific_name }} <a href="{{ URL::route('species_display_info', array($value->id)) }}">
                                    {{ $value->scientific_name }}
                                </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="{{ URL::asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/jeditable/jquery.jeditable.js') }}"></script>

    <script src="{{ URL::asset('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ URL::asset('js/inspinia.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/pace/pace.min.js') }}"></script>

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
