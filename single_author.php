<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!--start css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/slider.css" />
    <link rel="stylesheet" href="css/animation.css" />

    <!--end css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous" />
    <!--start js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!--end js-->
</head>

<body>
    <?php
    include 'functions.php';

    $article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where article.id_categorie = " . $_REQUEST['id_auteur']);
    $author = get_item("*", "auteur", " where id_auteur = " . $_REQUEST['id_auteur']);

    $path = get_path();
    $test = $author->fetch(PDO::FETCH_ASSOC);


    ?>
    <header class="sticky-top navbar-hide-on-scroll.fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light" style="height: 20vh;background-color: #ffffff;">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $path ?>/admin_article.php" class="nav-link" href="#">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ajouter
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Article</a>
                            <a class="dropdown-item" href="#">Auteur</a>
                            <a class="dropdown-item" href="#">Categorie</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Categorie1</a>
                            <a class="dropdown-item" href="#">Categorie2</a>
                            <a class="dropdown-item" href="#">Categorie3</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>
    </header>
    <main role="main">
        <div class="text-center p-5"><img style="height:200px;width:200px" class="rounded-circle" src="uploads/<?= $test['avatar_auteur'] ?>"></div>
        <h5 class="display-3 text-center p-5">
            <?= $test['fullname_auteur'] ?>
        </h5>
        </section>
        <section class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    <?php while ($row = $article->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-img-top">
                                    <img class="w-100" style="height: 200px" src="uploads/<?= $row['image_article'] ?>" alt="<?= $row['image_article'] ?>" />
                                </div>

                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="pr-2">
                                            <img src="uploads/<?= $row['avatar_auteur'] ?>" alt="avatar" width="72px" height="72px" class="rounded-circle" />
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-break"><?= $row['title_article'] ?></h2>
                                            <h6 class="text-info"><?= $row['fullname_auteur'] ?></h6>
                                        </div>
                                    </div>

                                    <p class="card-text " style="height:70px">
                                        <?= preview_para($row['contenu_article']) ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?>" class="btn btn-sm btn-outline-secondary btn--article bg-success text-white px-2 d-flex">
                                                <i class="far fa-eye p-1"></i>
                                                <span class="btn--article-hover"> Read</span>
                                            </a>

                                        </div>
                                        <small class="text-muted"><?= $row['date_article'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <section>
            <div class="container ">
                <div class="card-group p-5">
                    <div class="card bg-light form--hover-parent1" style="position: relative;">
                        <div class="bg-black form--hover-title2"></div>
                        <div class="card-body">
                            <form class="p-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Login</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" />
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Connecter
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Inscrire
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card bg-light form--hover-parent2" style="position: relative;">
                        <div class="bg-info form--hover-title1"></div>

                        <div class="card-body">
                            <form class="p-5">
                                <div class="form-group">
                                    <label for="exampleInputText1">Nom</label>
                                    <input type="text" class="form-control" id="exampleInputText1" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText2">Sujet</label>
                                    <input type="text" class="form-control" id="exampleInputText2" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Message</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Envoyer
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    Effacer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="px-4  p-md-5 bg-dark text-white">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24" />
                <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>