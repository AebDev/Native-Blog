<?php include 'functions.php';
            $path = get_path();         
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icons -->
    <link rel="icon" href="assets/img/logo/logo.png" type="image/png">
    <!-- Site title -->
    <title>Blog</title>
    <!-- CSS Files -->
    <!-- Bootstarp CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <!-- Font-Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
    <!-- CSS Components -->
    <link rel="stylesheet" type="text/css" href="assets/css/components.css" media="all" />
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="custom.css" media="all">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <!--+++++++ Start Preloader ++++++++++++-->
    <div class="site-preloader">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>
    <!--+++++++ End Preloader ++++++++++++-->
    <!--+++++++ Start Header Section ++++++++++++-->
    <header class="ak-header-sec">
        <div class="border-bottom header-area">
            <div class="navbar navbar-expand-lg navbar-light container py-lg-0">
            <div class="text-center p-4">
            <a href="<?= $path ?>"><img src="assets/img/logo/logo.png" width="60" alt=""></a>
        </div>
                <!-- Menu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse akh-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>/recent_post.php">Recent Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>#categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>/authors.php">Authors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>/contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /Menu -->
                <div class="d-flex">
                    <!-- Social Profiles -->
                    <ul class="header-social d-flex">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /Social Profiles -->
                    <!-- <div class="ah-search border-left pl-2 d-flex ml-1">
                        <span class="ah-serarch-icon" data-toggle="modal" data-target="#search-popup">
                        <i class="fa fa-search"></i>
                    </span> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- search popup -->
    <!-- <div id="search-popup" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog mw-100 m-0 " role="document">
            <div class="modal-content rounded-0 min-vh-100 bg-transparent">
                <div class="modal-body align-items-center d-flex justify-content-center text-center">
                    <span class="s-close" data-dismiss="modal">+</span>
                    <div class="row w-100">
                        <div class="col-md-8 offset-md-2 col-xl-6 offset-xl-3">
                            <div class="ah-search-wrap">
                                <div class="ah-search">
                                    <input type="text" placeholder="Type Your Keywords">
                                </div>
                                <p class="mt-4">Press Enter to begin your search.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--+++++++ End Header Section ++++++++++++++-->