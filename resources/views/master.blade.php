<!-- <!DOCTYPE html> -->
<html>
<head>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->


</head>
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div style="height: 100%;" class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div style="padding-bottom: 1000px;" class="navi">
                    <ul>
                        <li>
                            <a href="/"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a>
                        </li>
                        <li>
                            <a href="/getEmployees"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Employees</span></a>
                        </li>
                        <li>
                            <a href="/getCompanies"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Companies</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs">
                                        <a href="/" class="add-one">Logout</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="user-dashboard">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript">
    $(document).ready(function(){
       $('[data-toggle="offcanvas"]').click(function(){
           $("#navigation").toggleClass("hidden-xs");
       });
    });
</script>

</html>


