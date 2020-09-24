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

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where article.id_categorie = " . $_REQUEST['id_categorie'].' ORDER BY article.date_article DESC LIMIT '.$start_from.','.$record_per_page);

$category = get_item("*", "categorie", " where id_categorie = " . $_REQUEST['id_categorie']);
$count = get_item("count(*) as count", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where article.id_categorie = " . $_REQUEST['id_categorie']);

$path = get_path();
$test = $category->fetch(PDO::FETCH_ASSOC);

$c = $count->fetch(PDO::FETCH_ASSOC);
$card_color = ['tag-blue','tag-purple','tag-pink','tag-nevy','tag-violet','tag-carrot','tag-rosepink'];

$active_path = 'single_category.php?id_categorie='.$_REQUEST['id_categorie'].'&';

$page_query = get_item("count(*) as count", "article", " where id_categorie = " . $_REQUEST['id_categorie'].' ORDER BY id_article DESC');

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
                                    <li class="breadcrumb-item"><a href="<?= $path ?>#categories">Categories</a></li>
                                    <li class="breadcrumb-item active"><?= $test['nom_categorie'] ?></li>
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
                <div class="tag-head">
                    <div class="single-tag-block text-center position-relative" style="background: linear-gradient( -64deg, rgb(9,32,63,.72) 0%, rgb(5,13,24,.72) 99%),url('uploads/<?= $test['image_categorie'] ?>') no-repeat scroll center/cover">
                        <span data-aos="fade-up" class="border-style"></span>
                        <div class="col-lg-8 offset-lg-2" data-aos="fade-up">
                            <h2><?= $test['nom_categorie'] ?></h2>
                            <span><i class="fa fa-pencil mr-2"></i><?=$c['count'] ?> Articles written on photography</span>
                            <p><?= $test['description_categorie'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="row blog-grid blog-authors-wrapper" data-aos="fade-up">
                    
                    
                    <?php while ($row = $article->fetch(PDO::FETCH_ASSOC)) { if($row['image_article'] !== ''){?>
                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-post-item">
                                        <div class="post-image" style="background-image: url('uploads/<?= $row['image_article'] ?>');"></div>
                                        <div class="blog-post-content" data-aos="fade-up">
                                            <div class="post-tag">
                                            <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> "><?= $row['nom_categorie'] ?></a>
                                            </div>
                                            <div class="author-name">
                                            <span>By<a href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?> "><?= $row['fullname_auteur'] ?></a>on <?= date_format(date_create($row['date_article']),'d M Y') ?></span>
                                            </div>
                                            <h3><a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?>"><?= $row['title_article'] ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="post-card-bg post tag-food tag-lifestyle tag-portfolio <?=$card_color[rand(0,6)] ?>" data-aos="flip-right">
                                        <div class="postcard-bg-inner">
                                            <div class="postcard-bg-content">
                                                <div class="post-tag">
                                                <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> "><?= $row['nom_categorie'] ?></a>
                                                </div>
                                                <div class="author-content">
                                                <span>By<a href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?> "><?= $row['fullname_auteur'] ?></a>on <?= date_format(date_create($row['date_article']),'d M Y') ?></span>
                                                </div>
                                                <h3><a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?>"><?= $row['title_article'] ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
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

</body>

</html>