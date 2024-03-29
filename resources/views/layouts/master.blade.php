<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Plots Management System - Home</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    {{--
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- google fonts -->
    {{--
    <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet"> --}}
    @yield('header')
</head>

<body class="sidebar-menu-collapsed">
    <div class="se-pre-con"></div>
    <section>
        <!-- sidebar menu start -->
        <div class="sidebar-menu sticky-sidebar-menu">

            <!-- logo start -->
            <div class="logo">
                <h1><a href="/">Plot Management</a></h1>
            </div>

            <!-- if logo is image enable this -->
            <!-- image logo -->
            {{-- <div class="logo">
                <a href="index.html">
                    <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
                </a>
            </div> --}}
            {{--
            <!-- //image logo --> --}}

            <div class="flex items-center bg-blue-800 justify-center" style="height: 60px; width: 60px; ">
                <a href="/" title="logo"><img src="{{asset('assets/images/logo.png')}}" alt="logo-icon"> </a>
            </div>
            <!-- //logo end -->

            <div class="sidebar-menu-inner">

                <!-- sidebar nav start -->
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li class="active"><a href="/"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
                    </li>


                    @if (Auth::user()->role == '3')

                    <li class="menu-list">
                        <a href="/users"><i class="fa fa-users"></i>
                            <span>Users <i class="lnr lnr-chevron-right"></i></span></a>
                        <ul class="sub-menu-list">
                            <li><a href="/users">Customers</a> </li>
                            <li><a href="/admin/users/admin">Admins</a> </li>
                            {{-- <li><a href="people.html">People cards</a></li> --}}
                        </ul>
                    </li>
                    @endif

                    @if (Auth::user()->role != '0')
                    <li><a href="/authority/0"><i class="fa fa-th"></i> <span>Authority Levels</span></a></li>
                    @endif
                    <li><a href="/plots"><i class="fa fa-th"></i> <span>Plots</span></a></li>
                    {{-- <li><a href="/settings"><i class="fa fa-cogs"></i> <span>Settings</span></a></li> --}}
                    {{-- <li><a href="forms.html"><i class="fa fa-file-text"></i> <span>Forms</span></a></li> --}}
                </ul>
                <!-- //sidebar nav end -->
                <!-- toggle button start -->
                <a class="toggle-btn">
                    <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
                    <i class="fa fa-angle-double-right menu-collapsed__right"></i>
                </a>
                <!-- //toggle button end -->
            </div>
        </div>
        <!-- //sidebar menu end -->
        <!-- header-starts -->
        <div class="header sticky-header">

            <!-- notification menu start -->
            <div class="menu-right">
                <div class="navbar user-panel-top">
                    <div class="search-box">
                        <form action="#search-results.html" method="get">
                            <input class="search-input" placeholder="Search Here..." type="search" id="search">
                            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                    <div class="user-dropdown-details d-flex">
                        {{-- <div class="profile_details_left">
                            <ul class="nofitications-dropdown">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-bell-o"></i><span class="badge blue">3</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 3 new notifications</h3>
                                            </div>
                                        </li>
                                        <li><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a></li>
                                        <li class="odd"><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar2.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>New customer registered </p>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </a></li>
                                        <li><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar3.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Lorem ipsum dolor sit amet </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                            </a></li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#all" class="bg-primary">See all notifications</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                            class="fa fa-comment-o"></i><span class="badge blue">4</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>You have 4 new messages</h3>
                                            </div>
                                        </li>
                                        <li><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a></li>
                                        <li class="odd"><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar2.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>New customer registered </p>
                                                    <span>1 hour ago</span>
                                                </div>
                                            </a></li>
                                        <li><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar3.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Lorem ipsum dolor sit amet </p>
                                                    <span>2 hours ago</span>
                                                </div>
                                            </a></li>
                                        <li><a href="#" class="grid">
                                                <div class="user_img"><img src="assets/images/avatar1.jpg" alt=""></div>
                                                <div class="notification_desc">
                                                    <p>Johnson purchased template</p>
                                                    <span>Just Now</span>
                                                </div>
                                            </a></li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#all" class="bg-primary">See all messages</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="profile_details">
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3"
                                        aria-haspopup="true" aria-expanded="false">
                                        <div class="profile_img">
                                            <img src="{{asset('assets/images/profileimg.png')}}" class="rounded-circle"
                                                alt="" />
                                            <div class="user-active">
                                                <span></span>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                                        <li class="user-info">
                                            <h5 class="user-name">{{Auth::user()->name}}</h5>
                                            <span class="status ml-2">
                                                @if (Auth::user()->role == '3')
                                                Super Admin
                                                @else
                                                @if (Auth::user()->role == '3')
                                                Admin
                                                @else
                                                Customer Account
                                                @endif

                                                @endif
                                            </span>
                                        </li>
                                        <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
                                        <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
                                        <li class="logout"> <a href="/logout"><i class="fa fa-power-off"></i>
                                                Logout</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--notification menu end -->
        </div>
        <!-- //header-ends -->
        <!-- main content start -->
        <div class="main-content">

            <!-- content -->
            <div class="container-fluid content-top-gap">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @yield('location')
                        </li>

                    </ol>
                </nav>

                @yield('content')

            </div>
            <!-- //content -->
        </div>
        <!-- main content end-->
    </section>

    @yield('bottom')
    <!--footer section end-->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
    </script>
    <!-- /move top -->


    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/alpine.min.js')}}"></script>
    {{-- <script src="{{asset('css/jquery.dataTables.min.css')}}"></script> --}}
    @yield('scripts')
    <!-- chart js -->
    <script src="{{asset('assets/js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/utils.js')}}"></script>
    <!-- //chart js -->

    <!-- Different scripts of charts.  Ex.Barchart, Linechart -->
    <script src="{{asset('assets/js/bar.js')}}"></script>
    <script src="{{asset('assets/js/linechart.js')}}"></script>
    <!-- //Different scripts of charts.  Ex.Barchart, Linechart -->


    <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <!-- close script -->
    <script>
        var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
    </script>
    <!-- //close script -->

    <!-- disable body scroll when navbar is in active -->
    <script>
        $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
    </script>
    <!-- disable body scroll when navbar is in active -->

    <!-- loading-gif Js -->
    <script src="{{asset('assets/js/modernizr.js')}}"></script>
    <script>
        $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
    </script>
    <!--// loading-gif Js -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    {{-- @yield('scripts') --}}

</body>

</html>