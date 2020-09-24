<?php

include 'header.php';

$record_per_page = 9;
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur ORDER BY article.date_article DESC LIMIT ".$start_from.','.$record_per_page);

$path = get_path();

$card_color = ['tag-blue','tag-purple','tag-pink','tag-nevy','tag-violet','tag-carrot','tag-rosepink'];

$active_path = 'recent_post.php?';

$page_query = get_item("count(*) as count", "article", " ORDER BY id_article DESC");

?>

<main role="main">
    <!-- Breadcrumb Section -->
    <div class="page-bredcrumb-menu mediumgray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= $path ?>">Home</a></li>
                                    <li class="breadcrumb-item active">Recent Posts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- we start from here -->
    <div class="posts-section">
    
            <!--++++++ Post Cards area  ++++++-->

            <div class="blog-post-content-area p-top-8 p-bot-12">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- Single post card -->
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
                            
                        </div>
                    </div>
                    <?php

include 'pagination.php';

?>
                </div>
                <!-- / End of  Blog area -->
            
        </div>
</main>


<?php

include 'footer.php';


?>