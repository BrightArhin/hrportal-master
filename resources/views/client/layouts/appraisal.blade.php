
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>HR PORTAL</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}} />
    <link rel="stylesheet" href={{asset("css/light-bootstrap-dashboard.css?v=2.0.0")}} />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href={{asset("css/demo.css")}} />
    <link rel="stylesheet" href={{asset('css/styles.css')}}>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image={{asset("images/cocoa.jpg")}} >
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/home" class="simple-text">
                    HR PORTAL
                </a>
            </div>
            <div>
                <img src={{asset('images/faces/face-0.jpg')}} alt="Avatar" class="avatar">
            </div>
            <ul class="nav" style="background-color: rgba(255,255,255,.15); margin:10px;  border-radius: 10px">
                <li>
                    <a class="nav-link" href="dashboard.blade.php">
                        <div class="nav-details">
                            <p class="span-dash">Name</p>
                            <span class="span-center">-</span>
                            <span>{{$employee->name}}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="user.blade.php">
                        <div class="nav-details">
                            <p class="span-dash">Status</p>
                            <span class="span-center">-</span>
                            <span>{{$employee->status}}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="table.blade.php">
                        <div class="nav-details">
                            <p class="span-dash">Department</p>
                            <span class="span-center">-</span>
                            <span>{{$employee->department->name}}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="typography.blade.php">
                        <div class="nav-details">
                            <p class="span-dash">Location</p>
                            <span class="span-center ">-</span>
                            <span>{{$employee->location->name}}</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="icons.blade.php">
                        <div class="nav-details">
                            <p class="span-dash">Qualification</p>
                            <span class="span-center">-</span>
                            <span>
                                @if($employee->qualification)
                                    {{$employee->qualification->name}}
                                @else
                                    {{''}}
                                @endif
                            </span>
                        </div>
                    </a>
                </li>


                <li>
                    <a class="nav-link" href="icons.blade.php">
                        <div class="nav-details">
                            <p class="span-dash ">Job:</p>
                            <span class="span-center">-</span>
                            <span class="span-dash ">{{$employee->job->name}}</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home"> Dashboard </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nc-icon nc-zoom-split"></i>
                                <span class="d-lg-block">&nbsp;Search</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="no-icon">Account</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a href="{{ url('/logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">

                                @if(Auth::user() && Auth::user()->isAdmin===1)
                                    <a class="nav-link" href={{route('admin.home')}}>Admin Panel</span>
                                @else
                                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                @endif
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav>

                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.cocobod.gh">Information Systems Unit</a>
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script type="text/javascript" src={{asset("js/core/jquery.3.2.1.min.js")}} ></script>
<script type="text/javascript" src={{asset("js/core/popper.min.js")}} ></script>
<script type="text/javascript" src={{asset("js/core/bootstrap.min.js") }}></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src={{asset("js/plugins/bootstrap-switch.js")}}></script>
<!--  Google Maps Plugin    -->
<!--  Chartist Plugin  -->
<script src={{asset("js/plugins/chartist.min.js")}}></script>
<!--  Notifications Plugin    -->
<script src={{asset("js/plugins/bootstrap-notify.js")}}></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script type='text/javascript' src={{asset("js/light-bootstrap-dashboard.js?v=2.0.0
")}} ></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src={{asset("js/demo.js")}}></script>

{{--<script src={{asset('js/jquery.js')}}></script>--}}


@stack('scripts')

</html>
