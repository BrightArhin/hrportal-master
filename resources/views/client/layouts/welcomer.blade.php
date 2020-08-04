
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HR PORTAL</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link rel="stylesheet"  href={{asset("css/bootstrap.min.css")}} />
    <link rel="stylesheet" href={{asset("css/light-bootstrap-dashboard.css?v=2.0.0")}}  />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet"  href={{asset("css/demo.css")}} />
    <link rel="stylesheet" href={{asset('css/styles.css')}}>
</head>

<body>


        <div class="main-panel" style="width: 100%">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500" style="background-color: orange">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" style="color: white; font-weight: bold" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <a style="font-weight:bold; color: white" class="nav-link" href={{route('admin.home')}} >Admin Panel</span>
                                        @else
                                            <a style="font-weight:bold; color: white" class="nav-link" href="{{ url('/home') }}">Home</a>
                                        @endif
                                    </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content" >
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


</body>
<!--   Core JS Files   -->
<script type="text/javascript" src={{asset("js/core/jquery.3.2.1.min.js")}} ></script>
<script type="text/javascript" src={{asset("js/core/popper.min.js")}} ></script>
<script type="text/javascript" src={{asset("js/core/bootstrap.min.js") }}></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src={{asset("js/plugins/bootstrap-switch.js")}}></script>

<!--  Notifications Plugin    -->
<script src={{asset("js/plugins/bootstrap-notify.js")}}></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script type='text/javascript' src={{asset("js/light-bootstrap-dashboard.js?v=2.0.0
")}} ></script>




@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#modalLoginAvatar').modal('show');
        });
    </script>
@endif


</html>
