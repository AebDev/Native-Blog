<?php
include 'home_header.php';

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur ");

$category = get_item("*", "categorie", "");


$comment = get_item("*", "comentaire", " where id_article = " . $_REQUEST['id_article'] . " and comentaire_visibility = 1 order by id_comentaire DESC");
$nbcomment = $comment->fetchAll(PDO::FETCH_ASSOC);
$allarticle = $article->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($allarticle); $i++) {

    if ($allarticle[$i]['id_article'] == $_REQUEST['id_article']) {
        $post_row = $allarticle[$i];
        if (isset($allarticle[$i + 1])) {
            $next_row = $allarticle[$i + 1];
        }
        if (isset($allarticle[$i - 1])) {
            $prev_row = $allarticle[$i - 1];
        }
    }
}


$path = get_path();



if (isset($_REQUEST['nom_auteur_comentaire'])) {
    $col = array("nom_auteur_comentaire", "email_commentaire", "contenu_commentaire", "comentaire_date", "id_article",);
    $val = array("'" . validation($_REQUEST["nom_auteur_comentaire"]) . "'", "'" . validation($_REQUEST["email_commentaire"]) . "'", "'" . validation($_REQUEST["contenu_commentaire"]) . "'", "'" . date('Y-m-d H:i:s')  . "'", $_REQUEST["id_article"]);
    add_item("comentaire", $col, $val);

    header("location: single_post.php?id_article=" . $_REQUEST['id_article']);
}

?>
<main class="container">
    <section class="row">
        <div class="col-8 p-5">
            <div>
                <p class="display-4 pb-3 text-break">
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
                <p style="font-size: 20px;line-height: 30px; text-break">
                    <?= $post_row['contenu_article'] ?>
                </p>
            </div>
        </div>

        <div class="col-4 row py-5 px-3">
            <div class="card col-12">
                <div class="card-body d-flex">
                    <div>
                        <img src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="avatar" width="72px" height="72px" class="rounded-circle" />
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
                        <?php for ($i = 0; $i < 6; $i++) {
                            if (isset($allarticle[$i])) {
                        ?>
                                <div class="col-4 p-2">
                                    <a href="<?= $path . "/single_post.php?id_article=" . $allarticle[$i]['id_article'] ?>">
                                        <img class="w-100 h-100" src="./uploads/<?= $allarticle[$i]['image_article'] ?>" alt="<?= $allarticle[$i]['image_article'] ?>" />
                                    </a>
                                </div>
                        <?php }
                        } ?>

                    </div>
                </div>
            </div>
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2">Categories</h5>
                    <ul class="list-group list-group-flush">
                        <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li class="list-group-item border-0">
                                <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?>"><?= $row['nom_categorie'] ?></a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">

            <?php
            if (isset($prev_row)) {
                echo '<div class="col-6">
                    <a href="' . $path . '/single_post.php?id_article=' . $prev_row["id_article"] . '" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body next">
                                <div class="card-title h5">
                                <i class="fas fa-arrow-left px-5"></i> Prev
                                </div>
                                <div class="card-body row" style="height:250px">
                                <div class="col-6">
                                <img class="w-100" src="uploads/' . $prev_row["image_article"] . '" alt="">
                                </div>
                                    <h2 class="h2 col-6">
                                        ' . $prev_row["title_article"] . '
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
            } else {
                echo '<div class="col-6 "></div>';
            }
            if (isset($next_row)) {
                echo '<div class="col-6">
                    <a href="' . $path . '/single_post.php?id_article=' . $next_row["id_article"] . '" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body next">
                                <div class="card-title text-right h5">
                                    Next <i class="fas fa-arrow-right px-5"></i>
                                </div>
                                <div class="card-body row" style="height:250px">
                                <div class="col-6">
                                <img class="w-100" src="uploads/' . $next_row["image_article"] . '" alt="">
                                </div>
                                    <h2 class="h2 col-6">
                                        ' . $next_row["title_article"] . '
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>';
            } ?>
        </div>
    </section>
    <section class="py-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title h1 border-bottom pb-4"><?= count($nbcomment) ?> Comments</div>
                <?php
                if ($nbcomment > 0) {
                    foreach ($nbcomment as  $row) {
                        # code...

                ?>

                        <div class="card-body d-flex">
                            <div class="py-4">
                                <img src="image/avatar.png" alt="avatar" width="96px" class="rounded-circle" />

                            </div>
                            <div class="p-4 ">

                                <h3 class="text-info"><?= $row['nom_auteur_comentaire'] ?><span class="pl-3 text-dark h6"><?= $row['comentaire_date'] ?></span></h3>

                                <small><?= $row['email_commentaire'] ?></small>

                                <div class="bg-light rounded-pill w-100 px-3 py-3">
                                    <p class="h5">
                                        <?= $row['contenu_commentaire'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr />
                <?php }
                } ?>


            </div>
        </div>
    </section>
    <section class="pb-5">
        <div class="card ">
            <div class="card-body">
                <div class="card-title h1 border-bottom pb-4">
                    Leave Your Comment
                </div>
                <form action="" method="POST" class="p-5">
                    <div class="form-group">
                        <input type="text" class="form-control col-form-label-lg " name="nom_auteur_comentaire" id="exampleInputText1" placeholder="Your Name" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control col-form-label-lg " name="email_commentaire" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Your Email" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control col-form-label-lg" name="contenu_commentaire" id="exampleFormControlTextarea1" rows="3" placeholder="Your Comment"></textarea>
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