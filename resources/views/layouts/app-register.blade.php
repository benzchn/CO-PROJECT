<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/th/c/c3/Science_KKU_Thai_Emblem.png" sizes="32x32">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <style>
    body {
        background-image: url(http://sciweb.kku.ac.th/online_register/images/bg1.jpg);
        /* http://sciweb.kku.ac.th/online_register/images/bg3.jpg */
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
        font-family: 'K2D' !important;

    }

    .content {
        width: 650px;
        height: auto;
        margin: auto;
        /* padding: 30px; */

    }

    .nav-pills {
        width: 650px;
    }

    .nav-item {
        width: 50%;
    }

    .nav-pills .nav-link {
        font-weight: bold;
        padding-top: 13px;
        text-align: center;
        background: #343436;
        color: #fff;
        border-radius: 30px;
        height: 100px;
    }

    .nav-pills .nav-link.active {
        background: #fff;
        color: #000;
    }

    .tab-content {
        position: absolute;
        width: 650px;
        height: auto;
        margin-top: -50px;
        background: #fff;
        color: #000;
        border-radius: 30px;
        z-index: 1000;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.4);
        padding: 30px;
        margin-bottom: 50px;
    }

    .tab-content button {
        border-radius: 15px;
        width: 100px;
        margin: 0 auto;
        float: right;
    }
    .form {
        background: rgba(19, 35, 47, 0.9);
        padding: 10px;
        max-width: 650px;
        margin: auto;
        margin-top: 10px;
        border-radius: 4px;
        box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
        opacity: 95%;

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
    </style>

</head>
<body>
    @yield('body')
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</html>
