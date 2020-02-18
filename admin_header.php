<?php
include 'functions.php';
$path = get_path();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= basename($_SERVER['SCRIPT_NAME']) ?></title>
    <!--start css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/slider.css" />
    <link rel="stylesheet" href="css/animation.css" />

    <!--end css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/richtext.min.css" />

    <!--start js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--text editor script-->

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <!--text editor script-->


    <script src="script.js"></script>
    <!--end js-->
</head>

<body>

    <header>
        <!-- As a link -->
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= $path ?>">Navbar</a>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Search
            </button>
        </nav>

        <!-- As a heading -->
    </header>
    <main class="row bg-light">

        <div class="col-1 pr-0">
            <nav class="navbar position-fixed  navbar-dark bg-dark" style="top:0;bottom:0;height:100vh;">
                <div class="row  px-3">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link admin_header h2 text-center" href="<?= $path ?>/admin_article.php"><i class="fas fa-th-list"></i>
                                <br>
                                <h5> Article</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link admin_header h2 text-center" href="<?= $path ?>/admin_author.php"><i class="fas fa-users"></i>
                                <br>
                                <h5>Auteur</h5>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link admin_header h2 text-center" href="<?= $path ?>/admin_category.php"><i class="fas fa-tags "></i>
                                <br>
                                <h5>Categorie</h5>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>