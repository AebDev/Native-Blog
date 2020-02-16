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

    $article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where id_article=" . $_REQUEST['id_article']);

    $path = get_path();
    while ($row = $article->fetch(PDO::FETCH_ASSOC)) {
        $post_row = array_merge($row);
    }
    var_dump($post_row);
    ?>
    <main class="container">
        <section class="row">
            <div class="col-8 p-5">
                <div>
                    <p class="display-4 pb-3">
                        <?= $post_row['title_article'] ?>
                    </p>
                    <div class="row justify-content-between">
                        <p class=" p-3">
                            Categorie :
                            <?= $post_row['nom_categorie'] ?>
                        </p>
                        <p class=" p-3">
                            <?= $post_row['date_article'] ?>
                        </p>
                    </div>
                </div>
                <div class="pb-5">
                    <img class="w-100" src="uploads/<?= $post_row['image_article'] ?>" alt="<?= $post_row['image_article'] ?>" />
                </div>
                <div>
                    <p style="font-size: 20px;line-height: 30px;">
                        <?= $post_row['contenu_article'] ?>
                    </p>
                </div>
            </div>

            <div class="col-4 row py-5 px-3">
                <div class="card col-12">
                    <div class="card-body d-flex">
                        <div>
                            <img src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="avatar" width="72px" class="rounded-circle" />
                        </div>
                        <div class="p-3">
                            <h3 class="text-info"><?= $post_row['fullname_auteur'] ?></h3>
                            <p><?= $post_row['email_auteur'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="card col-12">
                    <div class="card-body">
                        <h5 class="card-title border-bottom pb-2">Chercher</h5>
                        <form class="form-inline my-2 my-lg-0 row">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                Search
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card col-12">
                    <div class="card-body">
                        <h5 class="card-title border-bottom pb-2">New Articles</h5>

                        <div class="row">
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                            <div class="col-4 p-2">
                                <img class="w-100" src="http://placehold.jp/250x250.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-body">
                        <h5 class="card-title border-bottom pb-2">Categories</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0">
                                <a href="#">Categorie 1</a>
                            </li>
                            <li class="list-group-item border-0">
                                <a href="#">Categorie 2</a>
                            </li>
                            <li class="list-group-item border-0">
                                <a href="#">Categorie 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body prev">
                                <div class="card-title">
                                    <i class="fas fa-arrow-left px-5"></i> Prev
                                </div>
                                <div class="card-body">
                                    <h2 class="display-4 ">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body next">
                                <div class="card-title text-right">
                                    Next <i class="fas fa-arrow-right px-5"></i>
                                </div>
                                <div class="card-body">
                                    <h2 class="display-4">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h1 border-bottom pb-4">2 Comments</div>
                    <div class="card-body d-flex">
                        <div class="py-4">
                            <img src="image/avatar.png" alt="avatar" width="96px" class="rounded-circle" />
                        </div>
                        <div class="p-4">
                            <h3 class="text-info">@Visitor</h3>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Asperiores recusandae optio fugit, architecto delectus quia
                                nesciunt officiis nemo, illo impedit, nisi perferendis fuga
                                eos debitis quis adipisci est dolore animi.
                            </p>
                        </div>
                    </div>
                    <hr />
                    <div class="card-body d-flex">
                        <div class="py-4">
                            <img src="image/avatar.png" alt="avatar" width="96px" class="rounded-circle" />
                        </div>
                        <div class="p-4">
                            <h3 class="text-info">@Visitor</h3>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Asperiores recusandae optio fugit, architecto delectus quia
                                nesciunt officiis nemo, illo impedit, nisi perferendis fuga
                                eos debitis quis adipisci est dolore animi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div class="card ">
                <div class="card-body">
                    <div class="card-title h1 border-bottom pb-4">
                        Leave Your Comment
                    </div>
                    <form class="p-5">
                        <div class="form-group">
                            <input type="text" class="form-control col-form-label-lg " id="exampleInputText1" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control col-form-label-lg " id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control col-form-label-lg" id="exampleFormControlTextarea1" rows="3" placeholder="Your Comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>