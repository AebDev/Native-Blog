<?php

include 'header.php';
// include 'home_header.php';

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur ORDER BY article.date_article DESC LIMIT 0,6");

$catlist = get_item("*", "categorie", "LIMIT 0,2");
$cat1 = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where categorie.id_categorie = (SELECT id_categorie FROM `categorie` LIMIT 0,1) ORDER BY article.date_article DESC");
$cat2 = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur where categorie.id_categorie = (SELECT id_categorie FROM `categorie` LIMIT 1,1) ORDER BY article.date_article DESC");

$category = get_item("*", "categorie", "");
$path = get_path();

$card_color = ['tag-blue','tag-purple','tag-pink','tag-nevy','tag-violet','tag-carrot','tag-rosepink'];


?>

<main role="main">
    
<!-- we start from here -->
    <div class="posts-section">
            <!-- Featured section area -->
            <div class="featured-posts-area p-y-12">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">
                            <?php  $row = $article->fetch(PDO::FETCH_ASSOC) ?>
                            <!-- Single post card -->
                            <div class="single-sidepost-item large-sidepost-item">
                                <div class="sidepost-image" style="background-image: url('uploads/<?= $row['image_article'] ?>');"></div>
                                <div class="blog-post-content" data-aos="fade-up">
                                    <div class="post-tag">
                                        <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> "><?= $row['nom_categorie'] ?></a>
                                    </div>
                                    <div class="author-name">
                                        <span>By<a href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?> "><?= $row['fullname_auteur'] ?></a>on <?= date_format(date_create($row['date_article']),'d M Y') ?></span>
                                    </div>
                                    <h3><a href="<?= $path . "/single_post.php?id_article=" . $row['id_article'] ?>"><?= $row['title_article'] ?></a></h3>
                                    <p><?= preview_para($row['contenu_article']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                            <?php  $row = $article->fetch(PDO::FETCH_ASSOC) ?>
                                <!-- Single post card -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-sidepost-item">
                                        <div class="sidepost-image" style="background-image: url('uploads/<?= $row['image_article'] ?>');"></div>
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
                                <?php  $row = $article->fetch(PDO::FETCH_ASSOC) ?>
                                <!-- Single post card -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-sidepost-item" data-aos="fade-up">
                                        <div class="sidepost-image" style="background-image: url('uploads/<?= $row['image_article'] ?>');"></div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Featured section area -->
            <!-- tag  area -->
            <div class="tag-area" id="categories">
                <div class="container">
                    <div class="row">

                        <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!-- Single Tag -->
                        <div class="col-lg-3 col-md-6 col-sm-6 my-2">
                            <a class="single-tag" href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> ">
                                <div class="single-tag-item" style="background-image: url('uploads/<?= $row['image_categorie'] ?>');" data-aos="flip-left">
                                    <div class="tag-content">
                                        <h2><?= $row['nom_categorie'] ?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <!-- End tag area -->

            <!--++++++ Post Cards area  ++++++-->

            <div class="blog-post-content-area p-top-8 p-bot-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-title">
                                <h2>Recent Posts</h2>
                            </div>
                        </div>
                    </div>

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
                            <div class="row">
                            <?php  $list = $catlist->fetch(PDO::FETCH_ASSOC) ?>
                                <div class="col-md-12">
                                    <div class="post-title">
                                        <h2><?= $list['nom_categorie'] ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Single post card -->
                                <?php while ($row = $cat1->fetch(PDO::FETCH_ASSOC)) { if($row['image_article'] !== ''){?>
                                
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
                                    <div class="post-card-bg" data-aos="flip-right">
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

                            <div class="row">
                            <?php  $list = $catlist->fetch(PDO::FETCH_ASSOC) ?>
                                <div class="col-md-12">
                                    <div class="post-title">
                                        <h2><?= $list['nom_categorie'] ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Single post card -->
                                <?php while ($row = $cat2->fetch(PDO::FETCH_ASSOC)) { if($row['image_article'] !== ''){?>
                                
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
                                    <div class="post-card-bg" data-aos="flip-right">
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
                </div>
                <!-- / End of  Blog area -->
            </div>
</main>


<?php

include 'footer.php';


?>