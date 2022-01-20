<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Hospital MS </title>

    <link rel="shortcut icon" href="http://localhost/Hospital-MS/assets/images/logo.jpg">
    <link rel="stylesheet" href="http://localhost/Hospital-MS/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital-MS/assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="http://localhost/Hospital-MS/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Hospital-MS/assets/css/style.css"/>
    <link href="http://localhost/Hospital-MS/admin/assetsDir/css/styles.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
</head>

<body>

<!-- ################# Header Starts Here#######################--->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 left-item">
                    <ul>
                        <li><i class="fas fa-envelope-square"></i> sales@smarteyeapps.com</li>
                        <li><i class="fas fa-phone-square"></i> +123 987 887 765</li>
                    </ul>
                </div>

                <div class="col-lg-5 d-none d-lg-block right-item">
                    <ul>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li><a class="btn btn-danger" href="/Hospital-MS/logout.php">Logout</a></li>
                        <?php } else { ?>
                            <li><a class="btn btn-group-lg" href="/Hospital-MS/admin/login.php">Login</a></li>
<!--                            <li><a class="btn btn-danger" href="/Hospital-MS/admin/patients/create.php">Signup</a></li>-->
                                                        <li><a class="btn btn-danger" href="/Hospital-MS/signup.php">Signup</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
    <div id="nav-head" class="header-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 nav-img">
                    <img src="http://localhost/Hospital-MS/assets/images/logo.jpg" alt="">
                    <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                                class="fas d-block d-md-none small-menu fa-bars"></i></a>
                </div>
                <div id="menu" class="col-md-9 d-none d-md-block nav-item">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about_us.php">About Us</a></li>
                        <li><a href="../services.php">Services</a></li>
                        <li><a href="../blog.php">Blog</a></li>
                        <li><a href="../gallery.php">Gallery</a></li>
                        <li><a href="../contact_us.php">Contact Us</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</header>
<?php
require './Admin/helpers/dbConnection.php'
//?>