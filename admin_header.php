<?php
include 'functions.php';
$path = get_path();
?>
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