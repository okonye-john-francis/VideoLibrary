<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video Library</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ URL::asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('vendor/datatables/css/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .tdstyle{
            float: right;
            margin-right: 20px;
        }
        #notification{
            width: 90%;
            margin: auto;
        }
        .highlight { background-color: Green; }
        .highlight2 { background-color: Orange; }
    </style>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <header class="align-items-start app-header flex-column flex-md-row navbar navbar-expand-md navbar-light">
        <div class="align-items-baseline d-flex flex-row navbar-brand p-lg-3 pl-3 pr-3 pt-3">
            <a class="" href="#">Video Library</a>
            <button class="collapsed ml-auto navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#side-menu-wrapper" aria-controls="side-menu" aria-expanded="false"
                    aria-label="Toggle navigation" style="">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <ul class="nav navbar-nav ml-md-auto flex-row navbar-top-links">
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    {{ 'Your logged in as '. Auth::user()->name }}&nbsp<i class="fa fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-user">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
    </header>
    <div class="d-md-flex">
        <div class="sidebar" role="navigation" >
            <div class="sidebar-nav collapse navbar-collapse show" id="side-menu-wrapper">
                <ul class="nav navbar-nav navbar-collapse flex-column side-nav list-group" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-white" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="list-group-item">
                        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/newOrders"><i class="fa fa-dashboard fa-fw"></i>Pending Orders ({{$number_of_pending_orders}})</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('movies.index')}}"><i class="fa fa-dashboard fa-fw"></i> Add Movie</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/allMovies"><i class="fa fa-dashboard fa-fw"></i> All movies</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('configurations.index')}}"><i class="fa fa-dashboard fa-fw"></i> Configuration Settings</a>
                    </li>

                    <li class="list-group-item">
                        <a href="/test2"><i class="fa fa-dashboard fa-fw"></i> Test2</a>
                    </li>
                   <!--  <li class="list-group-item">
                        <a href="/jq"><i class="fa fa-dashboard fa-fw"></i> JQuery Magic</a>
                    </li> -->
                   
                    
                    
                   
                    
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>

        <div id="page-wrapper" class="p-4">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

              
                        @yield('content')


                        
                        </div> 
                   </div> 

               </div>
            <!-- /.row -->
            
           </div>
        <!-- /#page-wrapper -->
    </div>

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('vendor/popper/popper.min.js') }}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('vendor/metisMenu/metisMenu.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<script type="text/javascript">

     $(document).ready(function () {

        $('#dataTables-example,#dataTables-example2').DataTable({
            responsive: true,
            drawCallback: function () {
                $('#dataTables-example_wrapper .row:last-child').addClass('mb-1 align-items-baseline');
            }
        });


        $('#delete').on('click', function(){
        if (confirm("Are you sure you want to delete this movie?")) {
            return true;
        }
        else{
            return false;
        }
    });


        $("#dropdownID").on('change', function() {
        if ($(this).val() == 'pricing'){
            event.preventDefault();
            document.getElementById('pricing-form').submit();
                        
        } else if($(this).val() == 'genre') {
            event.preventDefault();
            document.getElementById('genre-form').submit();
        }
    });


         $('#all').on('click', function(){

        if (this.checked) {

            $(".cities").attr("checked",true);

        }else{

            $(".cities").attr("checked",false);

        }
        
    });


    });


</script>

</body>

</html>
