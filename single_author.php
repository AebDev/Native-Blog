<?php
include 'header.php';

$record_per_page = 6;
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where article.id_auteur = " . $_REQUEST['id_auteur'].' ORDER BY article.date_article DESC LIMIT '.$start_from.','.$record_per_page);
$count = get_item("count(id_article) as count", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where article.id_auteur = " . $_REQUEST['id_auteur']);
$author = get_item("*", "auteur", " where id_auteur = " . $_REQUEST['id_auteur']);

$path = get_path();
$test = $author->fetch(PDO::FETCH_ASSOC);
$c = $count->fetch(PDO::FETCH_ASSOC);

$card_color = ['tag-blue','tag-purple','tag-pink','tag-nevy','tag-violet','tag-carrot','tag-rosepink'];

$active_path = 'single_author.php?id_auteur='.$_REQUEST['id_auteur'].'&';

$page_query = get_item("count(*) as count", "article", " where id_auteur = " . $_REQUEST['id_auteur'].' ORDER BY id_article DESC');


?>

<main>
        <!-- Breadcrumb Section -->
        <div class="page-bredcrumb-menu mediumgray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= $path ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= $path ?>/authors.php">Authors</a></li>
                                    <li class="breadcrumb-item active">Single Author</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb Section -->
        <div class="single-tag-sec p-top-12">
            <div class="container-fluid">
                <div class="tag-head author-head">
                    <div class="single-tag-block text-center position-relative" style="background: linear-gradient( -64deg, rgb(9,32,63,.72) 0%, rgb(5,13,24,.72) 99%),url('assets/img/sliders/3.jpg') no-repeat scroll center/cover">
                        <span data-aos="fade-up" class="border-style"></span>
                        <span class="written" data-aos="fade-up-left"><i class="fa fa-pencil mr-2"></i><?= $c['count'] ?> Articles written by Cliff Hanger</span>
                        <div class="col-lg-8 offset-lg-2" data-aos="fade-up">
                            <div class="author-pro"><img src="uploads/<?= $test['avatar_auteur'] ?>" alt="Cliff Hanger"></div>
                            <h2><?= $test['fullname_auteur'] ?></h2>
                            
                            <ul class="header-social d-flex justify-content-center mb-4 pb-2">
                                <li><a href="<?= $test['facebook_auteur'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $test['twitter_auteur'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= $test['linkdin_auteur'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="mailto: <?= $test['email_auteur'] ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                            <p><?= $test['description_auteur'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="row blog-grid blog-authors-wrapper">

                <?php while ($row = $article->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-lg-4 col-md-6 pb-4 scrollitem" data-aos="fade-up">
                        <article class="post-card post tag-food tag-lifestyle tag-portfolio tag-blue <?=$card_color[rand(0,6)] ?> featured">
                            <div class="text-block">
                                <div class="post-meta">
                                    <span class="meta-detail">By <a href="#" class="d-inline-block author-name"><?= $row['fullname_auteur'] ?></a> &nbsp;&nbsp;||&nbsp;&nbsp; <span class="date-time">on <?= date_format(date_create($row['date_article']),'d M Y') ?></span></span>
                                </div>
                                <div class="post-card-content">
                                    <h3 class="title"><a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?>"><?= $row['title_article'] ?></a></h3>
                                </div>
                                <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?>" class="post-tag"><?= $row['nom_categorie'] ?></a>
                            </div>
                        </article>
                    </div>
                <?php } ?>

                    
                </div>
                <?php

include 'pagination.php';

?>
            </div>
        </div>
    </main>

<?php 
include 'footer.php';
?>
