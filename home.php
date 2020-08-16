<?php
include 'home_header.php';

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur ");
$category = get_item("*", "categorie", "");
$path = get_path();


?>

<main role="main">
    <section class="pb-5">
        <div class="d-flex flex-column justify-content-center align-items-center slider" style="height: 90vh;">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up
                        the bulk of the card's content.
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="slideshow">
                <div class="slideshow-image" style="background-image: url('https://unsplash.it/1600/1400?image=492');background-attachment: fixed;"></div>
                <div class="slideshow-image" style="background-image: url('https://unsplash.it/1600/1400?image=487');background-attachment: fixed;"></div>
                <div class="slideshow-image" style="background-image: url('https://unsplash.it/1600/1400?image=483');background-attachment: fixed;"></div>
                <div class="slideshow-image" style="background-image: url('https://unsplash.it/1600/1400?image=478')"></div>
            </div>
        </div>
    </section>
    <section class=" py-5 " id="category">
        <h2 class="display-4 p-2">Categorie</h2>
        <div class="row justify-content-around flex-wrap">
            <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="col-2 p-0 m-2 admin_header" style="height: 120px; background-image: url('uploads/<?= $row['image_categorie'] ?>');background-size: 100%;">
                    <a class=" text-white" href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> ">
                        <div class="h-100" style="background-color: #00000050"></div>

                        <h4 style="position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);"><?= $row['nom_categorie'] ?></h4>
                    </a>

                </div>
            <?php } ?>
        </div>
    </section>
    <section class="album py-5 ">

        <div class="container">

            <div class="row">

                <?php while ($row = $article->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-img-top" style="height: 200px">
                                <img class="w-100" src="uploads/<?= $row['image_article'] ?>" alt="<?= $row['image_article'] ?>" />
                            </div>

                            <div class="card-body bg-white">
                                <div class="d-flex">
                                    <div class="pr-2">
                                        <img src="uploads/<?= $row['avatar_auteur'] ?>" alt="avatar" width="72px" height="72px" class="rounded-circle" />
                                    </div>
                                    <div class="p-1">
                                        <h4 class="text-break"><?= $row['title_article'] ?></h4>
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
                    <div class=" form--hover-title1"></div>

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