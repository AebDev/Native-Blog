
    <?php
    
include 'functions.php';
$path = get_path();

session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}


$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur");

if (isset($_GET["id_article"])) {
    del_item("article", "id_article = " . $_GET["id_article"]);
    header("Location: admin_article.php");
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title><?= basename($_SERVER['SCRIPT_NAME']) ?></title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"  />
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="sidebar-is-reduced">
        <header class="l-header">
            <div class="l-header__inner clearfix">
                <div class="c-header-icon js-hamburger">
                    <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
                </div>
                <!-- <div class="c-header-icon has-dropdown"><span class="c-badge c-badge--header-icon animated shake">12</span><i class="fa fa-bell"></i>
                    <div class="c-dropdown c-dropdown--notifications">
                        <div class="c-dropdown__header"></div>
                        <div class="c-dropdown__content"></div>
                    </div>
                </div>
                <div class="c-search">
                    <input class="c-search__input u-input" placeholder="Search..." type="text" />
                </div> -->

        <?php  if (isset($_SESSION['username'])) : ?>
            <div class="header-icons-group">
                <a href="admin_header.php?logout='1'" style="color: red;"><div class="c-header-icon logout"><i class="fa fa-power-off"></i></div></a>
            </div>
		<?php endif ?>
            
            </div>
        </header>
        <div class="l-sidebar">
            <div class="logo">
                <a class="logo__txt" href="<?= $path ?>"><img src="./assets/img/logo/adminlogo.png" width="50" alt=""></a>
            </div>
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu">
                    <ul class="u-list">
                        <li class="c-menu__item is-active" data-toggle="tooltip" title="Article">
                            <a style="color: #fff;text-decoration: none;"  href="<?= $path ?>/admin_article.php">
                                <div class="c-menu__item__inner"><i class="fas fa-th-list"></i>
                                    <div class="c-menu-item__title"><span>Article</span></div>
                                </div>
                            </a>
                        </li>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Auteur">
                            <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_author.php">
                            <div class="c-menu__item__inner"><i class="fas fa-users"></i>
                                <div class="c-menu-item__title"><span>Auteur</span></div>
                            </div>
                            <a>
                        </li>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Categorie">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_category.php">
                            <div class="c-menu__item__inner"><i class="fas fa-tags"></i>
                                <div class="c-menu-item__title"><span>Categorie</span></div>
                            </div>
                        <a>
                        </li>
                        <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Comentaire">
                        <a style="color: #fff;text-decoration: none;" href="<?= $path ?>/admin_comment.php">
                            <div class="c-menu__item__inner"><i class="fas fa-comments"></i>
                                <div class="c-menu-item__title"><span>Comentaire</span></div>
                            </div>
                        <a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </body>


    <main class="l-main">
        <div class="content-wrapper content-wrapper--with-bg">

        <table class="table table-hover bg-white" style="background-color: #fff;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Auteur</th>
                <th scope="col">Categorie</th>
                <th scope="col">Date</th>
                <th scope="col">Afficher</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $article->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><?= $row['id_article'] ?></th>
                    <td><img src="uploads/<?= $row['image_article'] ?>" alt="<?= $row['image_article'] ?>" style="width:100px" /></td>
                    <td class="text-break"><?= $row['title_article'] ?></td>

                    <td><?= $row['fullname_auteur'] ?></td>
                    <td><?= $row['nom_categorie'] ?></td>
                    <td><?= $row['date_article'] ?></td>
                    <td>
                        <a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?> " class="btn btn-success ">
                            <i class="far fa-eye"></i> Afficher
                        </a>
                    </td>
                    <td>
                        <a href="<?= $path . "/admin_up_article.php?id_article=" . $row['id_article'] ?> " class="btn btn-warning ">
                            <i class="fas fa-pen"></i> Modifer
                        </a>
                    </td>
                    <td>
                        <a href="<?= $path . "/admin_article.php?id_article=" . $row['id_article'] ?> " name="delete" class="btn btn-danger ">
                            <i class="fas fa-trash-alt "></i> Supprimer
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
            

        </div>
    </main>
    
<?php 
include 'admin_footer.php';
?>

