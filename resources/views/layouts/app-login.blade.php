<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบครุภัณฑ์ ภาควิชาวิทยาการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/th/c/c3/Science_KKU_Thai_Emblem.png" sizes="32x32">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="iconlogo.png" sizes="32x32">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
    <style>
        .form {
            background: rgba(19, 35, 47, 0.9);
            padding: 50px;
            max-width: 600px;
            margin: auto;
            margin-top: 40px;
            border-radius: 4px;
            box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
            opacity: 95%;

        }

        .back {
            background-image: url(http://sciweb.kku.ac.th/online_register/images/bg1.jpg);
            background-attachment: fixed;
            height: 100%;
            width: 100%;
            padding: 0px;
            margin: 0px;
            background-position: top left;
            position: relative;
            overflow-x: hidden;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 70px;
            background: #9bb9e9;
            background: -webkit-linear-gradient(bottom, #005bea, #00c6fb);
            background: -o-linear-gradient(bottom, #005bea, #00c6fb);
            background: -moz-linear-gradient(bottom, #005bea, #00c6fb);
            background: linear-gradient(bottom, #005bea, #00c6fb);
        }


        .pagination {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 15px;
            margin: auto;
            text-align: center;
        }

        .pagination__dot {
            position: relative;
            /* width: 8px;
  height: 8px;
  border: 2px solid #5ae4dd; */
            border-radius: 100px;
            display: inline-block;
            cursor: pointer;
            margin: 0 4px;
            -webkit-transition: .3s;
            transition: .3s;
            text-align: center;
        }

        .pagination__dot--active {
            background: #5ae4dd;
        }

        .pagination__dot:hover {
            -webkit-transition: .3s;
            transition: .3s;
            border-color: white;
            background: white;
        }

        .pagination__dot:hover:before {
            top: -48px;
            opacity: 1;
        }

        .pagination__dot:hover:after {
            top: -18px;
            opacity: 1;
        }

        .pagination__dot:before {
            position: absolute;
            top: -40px;
            left: -36px;
            background: white;
            width: 250px;
            font-size: 14px;
            padding: 4px;
            margin-top: -22px;
            border-radius: 3px;
            content: attr(data-tooltip);
            opacity: 0;
            -webkit-transition: .3s;
            transition: .3s;
        }

        .pagination__dot:after {
            position: absolute;
            width: 0;
            height: 0;
            top: -5px;
            left: -2px;
            border-top: 10px solid white;
            border-right: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 10px solid transparent;
            content: "";
            opacity: 0;
            -webkit-transition: .3s;
            transition: .3s;
        }
    </style>


</head>

<body class="back">

    @yield('body')
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('js/main.js') }}"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <!-- Javascript -->
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- <script src="asset/js/jquery.backstretch.min.js"></script> -->
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
