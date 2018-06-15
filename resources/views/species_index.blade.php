<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aquarinz Administration</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert/dist/sweetalert.css">
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

   <    <nav class="navbar-default navbar-static-side" role="navigation">
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
                      <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
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
                        <h5>Species Table</h5>
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
                        <a style="color:white; float:right;" class="btn btn-info" href="{{ URL::route('species_create') }}">ADD SPECIES</a>
                        <button type="submit" id="species_show" style="color:black;font-family: Arial" class="btn btn-small btn-success" onClick="species_show()";> <i class="glyphicon glyphicon-align-justify"></i> Show </button> 
                        <button type="submit" id="species_edit" style="color:black;font-family: Arial" class="btn btn-small btn-info" onClick="species_edit()";> <i class="glyphicon glyphicon-edit"></i> Edit </button> 
                        <button type="submit" id="species_delete" style="color:black; font-family: Arial" class="btn btn-small btn-danger" onClick="species_delete()";> <i class="glyphicon glyphicon-trash"></i> Delete </button> 
                        
                <div class="table-responsive">
                    <form method="GET" name="get_checkbox">
                    <table id="allBlogs" class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr style="text-align: center;">
                        <th><input type="checkbox" name="selectAll" id="selectAll"></th>
                        <th>No</th>
                        <th>Species Name</th>
                        <th>Phylum</th>
                        <th>Class</th>
                        <th>Family</th>
                        <th>Genus</th>
                        <th>Common Name</th>
                        <th>Size</th>
                        <th>Habitat</th>
                        <th>Life History</th>
                        <th>Image</th>

                    </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($species as $value)
                        <tr style="text-align: center;">
                            <td><input type="checkbox" name="selected_species[]" value="{{ $value->id }}" id="selected_species" class="select_checkbox"></td> 
                            <td><?php echo $no ?></td>
                            <td>{{ $value->scientific_name }}</td>
                            <td>{{ $value->phylum }}</td>
                            <td>{{ $value->class }}</td>
                            <td>{{ $value->family }}</td>
                            <td>{{ $value->genus }}</td>
                            <td>{{ $value->common_name }}</td>
                            <td>{{ $value->size}}</td>
                            <td>{{ $value->habitat}}</td>
                            <td>{{ $value->life_history}}</td>
                            <td style="img"><img src="img/{{$value->image}}" class="img-portfolio img-responsive" height="200" width="200"></td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                    </form>
                    </table>
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
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
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

         $(function() {

            $('#selectAll').click(function() {
                if ($(this).prop('checked')) {
                    $('.select_checkbox').prop('checked', true);
                } else {
                    $('.select_checkbox').prop('checked', false);
                }
            });

        });

           function species_show()
        {
            var x =[];

            if (this.checked)
            {
              $('#selected_species').removeAttr('disabled');
              $('#allBlogs :checked').each(function()
              {
                x.push($(this).val());
              });
            }

            x = document.getElementById("selected_species").value;
            document.get_checkbox.action = "{{URL::route('species_show')}}";
            document.get_checkbox.submit();
        }

        function species_edit()
        {
            var x =[];

            if (this.checked)
            {
              $('#selected_species').removeAttr('disabled');
              $('#allBlogs :checked').each(function()
              {
                x.push($(this).val());
              });
            }

            x = document.getElementById("selected_species").value;
            document.get_checkbox.action = "{{URL::route('species_edit')}}";
            document.get_checkbox.submit();
        }

        function species_delete()
        {
            var x =[];

              $('button#species_delete').on('click',
        function(){
          swal({
           title: "Are you sure?",
           text: "You will not be able to recover this species!",
           type: "warning",
           html:true,
           showCancelButton: true,
           confirmButtonColor: '#3ebf8f',
           confirmButtonText: 'Yes,delete it!',
           closeOnConfirm: true,
           showLoaderOnConfirm:false
          },
          function(){
            $.ajax({
                 success: function (speciesRows) {
                     swal({
                           title: "Data Removed!",
                           type: "success",
                           html:true,
                           showCancelButton: false,
                           confirmButtonColor: '#3ebf8f',
                           confirmButtonText: 'OK',
                           closeOnConfirm: true
                           },
                           function(){

                             if (this.checked)
            {
              $('#selected_species').removeAttr('disabled');
              $('#allBlogs :checked').each(function()
              {
                x.push($(this).val());
              });
            }

            x = document.getElementById("selected_species").value;
            document.get_checkbox.action = "{{URL::route('species_delete')}}";
            document.get_checkbox.submit();
                             
                           });
              }
            });
          });
        })
       
    }
    </script>

</body>

</html>
