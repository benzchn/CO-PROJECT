<!doctype html>
<html class="fixed">


<head>
  <meta charset="UTF-8" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=0.1"> -->
  <title>ระบบครุภัณฑ์ ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</title>
  <link rel="icon" href="http://sciweb.kku.ac.th/online_register/images/logo11.png" sizes="32x32">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@300&display=swap" rel="stylesheet">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- Data Table -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

  <!-- icon -->
  <!-- <script src="https://kit.fontawesome.com/ba8cda9d5b.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">




  <link href="dist/css/select2.min.css" rel="stylesheet" />
  <script src="dist/js/select2.min.js"></script>


  <style>
    body {
      font-family: 'K2D', sans-serif;
    }


    * {
      margin: 0;
      padding: 0;
    }

    i {
      margin-right: 10px;
    }

    /*----------multi-level-accordian-menu------------*/
    .navbar-logo {
      padding: 15px;
      color: #fff;
    }

    .navbar-mainbg {
      background-color: #5161ce;
      padding: 0px;
    }

    #navbarSupportedContent {
      overflow: hidden;
      position: relative;
    }

    #navbarSupportedContent ul {
      padding: 0px;
      margin: 0px;
    }

    #navbarSupportedContent ul li a i {
      margin-right: 10px;
    }

    #navbarSupportedContent li {
      list-style-type: none;
      float: left;
    }

    #navbarSupportedContent ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 15px;
      display: block;
      padding: 20px 20px;
      transition-duration: 0.6s;
      transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
      position: relative;
    }

    /* ul li a{
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        display: block;
        padding: 20px 20px;
        transition-duration: 0.6s;
        transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
      } */

    #navbarSupportedContent>ul>li>a.active {
      color: #5161ce;
      background-color: #fff;
      transition: all 0.7s;
      border-top-left-radius: 25px;
      border-top-right-radius: 25px;

      transition-duration: 0.4s;
      transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    #navbarSupportedContent a:not(:only-child):after {
      content: "\f105";
      position: absolute;
      right: 20px;
      top: 10px;
      font-size: 14px;
      font-family: "Font Awesome 5 Free";
      display: inline-block;
      padding-right: 3px;
      vertical-align: middle;
      font-weight: 900;
      transition: 0.5s;
    }

    #navbarSupportedContent .active>a:not(:only-child):after {
      transform: rotate(90deg);
    }

    .hori-selector {
      display: inline-block;
      position: absolute;
      height: 100%;
      top: 0px;
      left: 0px;
      transition-duration: 0.4s;
      transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
      background-color: #fff;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      margin-top: 10px;
    }

    .hori-selector .right,
    .hori-selector .left {
      position: absolute;
      width: 25px;
      height: 25px;
      background-color: #fff;
      bottom: 10px;
    }

    .hori-selector .right {
      right: -25px;
    }

    .hori-selector .left {
      left: -25px;
    }

    .hori-selector .right:before,
    .hori-selector .left:before {
      content: "";
      position: absolute;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #5161ce;
    }

    .hori-selector .right:before {
      bottom: 0;
      right: -25px;
    }

    .hori-selector .left:before {
      bottom: 0;
      left: -25px;
    }

    @media (max-width: 991px) {
      #navbarSupportedContent ul li a {
        padding: 12px 30px;
      }

      .hori-selector {
        margin-top: 0px;
        margin-left: 10px;
        border-radius: 0;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
      }

      .hori-selector .left,
      .hori-selector .right {
        right: 10px;
      }

      .hori-selector .left {
        top: -25px;
        left: auto;
      }

      .hori-selector .right {
        bottom: -25px;
      }

      .hori-selector .left:before {
        left: -25px;
        top: -25px;
      }

      .hori-selector .right:before {
        bottom: -25px;
        left: -25px;
      }
    }


    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 100%;
    }


    #featured {
      position: relative;
    }

    #featuredico {
      position: absolute;
      top: 0;
      left: 0;
    }

    article {
      width: 280px;
      margin-right: 40px;
      display: inline-block;
      vertical-align: top;
      border: 1px solid #c8c8c8;
      margin-bottom: 20px;
      padding: 7px;
      border-radius: 3px;
      box-shadow: 0 2px 3px #ccc;
      background-color: white;
      *display: inline;
      zoom: 1;
    }

    article p {
      margin-bottom: 7px;
    }

    .readmore {
      background-color: black;
      padding: 5px 10px;
      color: white;
      text-decoration: none;
      border-radius: 3px;
      display: inline-block;
    }

    .readmore:hover {
      background-color: #383838;
    }

    .old_ie header h1,
    .old_ie nav,
    .old_ie nav li,
    .old_ie #adbanner a,
    .old_ie article,
    .old_ie .readmore,
    .old_ie #sponsors a {
      display: inline;
      zoom: 1;
    }

    .icons {
      display: inline;
      float: right;
    }

    .notification {
      padding-top: 10px;
      position: relative;
      display: inline-block;
    }

    .number {
      height: 22px;
      width: 22px;
      background-color: #d63031;
      border-radius: 20px;
      color: white;
      text-align: center;
      position: absolute;
      top: 23px;
      left: 60px;
      /* padding: 3px; */
      border-style: solid;
      border-width: 2px;
    }

    .number:empty {
      display: none;
    }

    .notBtn {
      transition: 0.5s;
      cursor: pointer;
    }

    .fas {
      font-size: 25pt;
      padding-bottom: 10px;
      color: black;
      margin-right: 40px;
      margin-left: 40px;
    }

    .box {
      width: 400px;
      height: 0px;
      border-radius: 10px;
      transition: 0.5s;
      position: absolute;
      overflow-y: scroll;
      padding: 0px;
      left: -300px;
      margin-top: 5px;
      background-color: #f4f4f4;
      -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
      box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
      cursor: context-menu;
    }

    .fas:hover {
      color: #d63031;
    }

    .notBtn:hover>.box {
      height: 60vh;
    }

    .content {
      padding: 20px;
      color: black;
      vertical-align: middle;
      text-align: left;
    }

    .gry {
      background-color: #f4f4f4;
    }

    .top {
      color: black;
      padding: 10px;
    }

    .display {
      position: relative;
    }

    .cont {
      position: absolute;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: #f4f4f4;
    }

    .cont:empty {
      display: none;
    }

    .stick {
      text-align: center;
      display: block;
      font-size: 50pt;
      padding-top: 70px;
      padding-left: 80px;
    }

    .stick:hover {
      color: black;
    }

    .cent {
      text-align: center;
      display: block;
    }

    .sec {
      padding: 25px 10px;
      background-color: #f4f4f4;
      transition: 0.5s;
    }

    .profCont {
      padding-left: 15px;
    }

    .profile {
      -webkit-clip-path: circle(50% at 50% 50%);
      clip-path: circle(50% at 50% 50%);
      width: 60px;
      float: left;
    }

    .txt {
      vertical-align: top;
      font-size: 1.25rem;
      padding: 5px 10px 0px 115px;
    }

    .sub {
      font-size: 1rem;
      color: grey;
    }

    .new {
      border-style: none none solid none;
      border-color: red;
    }

    .sec:hover {
      background-color: #bfbfbf;
    }

    #cssmenu,
    #cssmenu ul,
    #cssmenu ul li,
    #cssmenu ul li a {
      margin: 0;
      padding: 0;
      border: 0;
      list-style: none;
      line-height: 1;
      display: block;
      position: relative;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    #cssmenu:after,
    #cssmenu>ul:after {
      content: ".";
      display: block;
      clear: both;
      visibility: hidden;
      line-height: 0;
      height: 0;
    }

    #cssmenu {
      width: auto;
      border-bottom: 3px solid #47c9af;
      line-height: 1;
    }

    #cssmenu ul {
      background: #ffffff;
    }

    #cssmenu>ul>li {
      float: left;
    }

    #cssmenu.align-center>ul {
      font-size: 0;
      text-align: center;
    }

    #cssmenu.align-center>ul>li {
      display: inline-block;
      float: none;
    }

    #cssmenu.align-right>ul>li {
      float: right;
    }

    #cssmenu.align-right>ul>li>a {
      margin-right: 0;
      margin-left: -4px;
    }

    #cssmenu>ul>li>a {
      z-index: 2;
      padding: 18px 25px 12px 25px;
      font-size: 15px;
      font-weight: 400;
      text-decoration: none;
      color: #444444;
      -webkit-transition: all .2s ease;
      -moz-transition: all .2s ease;
      -ms-transition: all .2s ease;
      -o-transition: all .2s ease;
      transition: all .2s ease;
      margin-right: -4px;
    }

    #cssmenu>ul>li.active>a,
    #cssmenu>ul>li:hover>a,
    #cssmenu>ul>li>a:hover {
      color: #ffffff;
    }

    #cssmenu>ul>li>a:after {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      z-index: -1;
      width: 100%;
      height: 120%;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      content: "";
      -webkit-transition: all .2s ease;
      -o-transition: all .2s ease;
      transition: all .2s ease;
      -webkit-transform: perspective(5px) rotateX(2deg);
      -webkit-transform-origin: bottom;
      -moz-transform: perspective(5px) rotateX(2deg);
      -moz-transform-origin: bottom;
      transform: perspective(5px) rotateX(2deg);
      transform-origin: bottom;
    }

    #cssmenu>ul>li.active>a:after,
    #cssmenu>ul>li:hover>a:after,
    #cssmenu>ul>li>a:hover:after {
      background: #47c9af;
    }

    .bio-info {
      padding: 5%;
      background: #fff;
      box-shadow: 0px 0px 4px 0px #b0b3b7;
    }

    .name {
      /* font-family: 'Charmonman', cursive; */
      font-weight: 600;
    }

    .bio-image {
      text-align: center;
    }

    .bio-image img {
      border-radius: 50%;
    }

    .bio-content {
      text-align: left;
    }

    .bio-content p {
      font-weight: 600;
      font-size: 30px;
    }
  </style>
</head>

<body>
    <section class="body">

          <nav class="navbar navbar-expand-lg navbar-mainbg">
    <div class="container">
      <img src="../images/cs_logo.png" style="
          -webkit-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, .5), 0px -15px 35px 0px rgba(50, 50, 50, .3) inset;
	        -moz-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, .5), 0px -15px 35px 0px rgba(50, 50, 50, .3) inset;
	        box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, .5), 0px -15px 35px 0px rgba(50, 50, 50, .3) inset;
	        color: rgba(100, 100, 100, .8);
	        text-shadow: 1px 1px 0 rgba(255, 255, 255, .6);
	        background: rgba(255, 255, 255, 255);
          width:15%;
          ">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
          <!-- <div class="hori-selector">
              <div class="left"></div>
              <div class="right"></div>
            </div> -->

          <li class="nav-item">
            <a href="/home" class="nav-link"><i class="far fa-newspaper"></i>หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a href="/user-equipment" class="nav-link"><i class="far fa-keyboard"></i>ครุภัณฑ์</a>
          </li>
          <li class="nav-item">
            <a href="/user-rent" class="nav-link"><i class="far fa-paper-plane"></i>ติดตามการยืม - คืน ครุภัณฑ์</a>
          </li>
          <li class="nav-item">
            <a href="/repair-report" class="nav-link"><i class="far fa-sun"></i>แจ้งซ่อม</a>
          </li>
          <li class="nav-item">
            <a href="/repair-list" class="nav-link"><i class="far fa-clipboard"></i>ติดตามการแจ้งซ่อม</a>
          </li>
        </ul>
        <!-- Example single danger button -->
      </div>

    <div class="btn-group" style="padding-right:20px;">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/profile">ข้อมูลส่วนตัว</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ออกจากระบบ</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
      </div>
    </div>
  </nav>

        <!-- start: header -->
        {{-- <header class="header">
            <div class="logo-container">
                <a href="index.php" class="logo">
                    <img src="../images/cs_logo.png" width="18%">
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                <span class="separator"></span>
                <ul class="notifications">
                    <li>
                        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                            <i class="fa fa-bell"></i>
                            <span class="badge">3</span>
                        </a>

                        <div class="dropdown-menu notification-menu">
                            <div class="notification-title">
                                <span class="pull-right label label-default">3</span>
                                Alerts
                            </div>

                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-thumbs-down bg-danger"></i>
                                            </div>
                                            <span class="title">Server is Down!</span>
                                            <span class="message">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-lock bg-warning"></i>
                                            </div>
                                            <span class="title">User Locked</span>
                                            <span class="message">15 minutes ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix">
                                            <div class="image">
                                                <i class="fa fa-signal bg-success"></i>
                                            </div>
                                            <span class="title">Connection Restaured</span>
                                            <span class="message">10/10/2014</span>
                                        </a>
                                    </li>
                                </ul>

                                <hr />

                                <div class="text-right">
                                    <a href="#" class="view-more">View All</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <!-- <figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure> -->
                        <div class="profile-info">



                            <span class="name">{{ Auth::user()->name }}</span>
                            <!-- <span class="role">administrator</span> -->
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="myprofile.php"><i class="fa fa-user"></i>
                                    ข้อมูลส่วนตัว</a>
                            </li>
                             <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }} " onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                    {{ __('ออกจากระบบ') }}</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                </div>
            </div>
            <!-- end: search & user box -->
        </header> --}}
        <!-- end: header -->
        {{-- <div class="inner-wrapper"> --}}
            <!-- start: sidebar -->
            {{-- <aside id="sidebar-left" class="sidebar-left">
                <div class="sidebar-header">
                    <div class="sidebar-title">
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                        data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="index.php">
                                        <img src='https://image.flaticon.com/icons/svg/609/609803.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;หน้าแรก</span>
                                    </a>
                                </li>
                                <li class="nav-active">
                                    <a href="tables_list.php">
                                        <img src='https://image.flaticon.com/icons/svg/2535/2535554.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;ครุภัณฑ์</span>
                                    </a>
                                </li>
                                <li class="nav-active">
                                    <a href="rent_my.php">
                                        <img src='https://image.flaticon.com/icons/svg/609/609753.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;รายการครุภัณฑ์ที่ยืม</span>
                                    </a>
                                </li>

                                <li class="nav-parent">
                                    <a>
                                        <img src='https://image.flaticon.com/icons/svg/745/745437.svg' width="21px"
                                            height="21px">
                                        <span>&nbsp;&nbsp;งานซ่อม</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <!-- <li>
                                            <a href="#">
                                                พัสดุของฉัน
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="repair_report.php">
                                                แจ้งซ่อม
                                            </a>
                                        </li>
                                        <li>
                                            <a href="repair_follow.php">
                                                ติดตามการสั่งซ่อมของฉัน
                                            </a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">
                                                รายการซ่อม
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </aside> --}}
            <!-- end: sidebar -->

            @yield('body')


            <script>
                $(document).ready(function () {
                    //inialize datatable
                    $('#myTable').DataTable({

                    });

                    //hide alert
                    $(document).on('click', '.close', function () {
                        $('.alert').hide();
                    })
                });

                const currentLocation = location.href;
                const menuItem = document.querySelectorAll('a');
                const menuLength = menuItem.length
                for (let i=0; i< menuLength ;i++){

              if(menuItem[i].href === currentLocation){
                menuItem[i].className = "nav-link active"
              }
                }

            </script>

</body>

</html>
