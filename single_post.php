<?php
// include 'home_header.php';

include 'header.php';

$article = get_item("*", "article", "JOIN categorie on categorie.id_categorie = article.id_categorie JOIN auteur on auteur.id_auteur = article.id_auteur order by id_article DESC");

$category = get_item("categorie.id_categorie,nom_categorie,COUNT(article.id_article) as count", "categorie", "join article on article.id_categorie = categorie.id_categorie GROUP by categorie.id_categorie");


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
<main >
     <!-- Breadcrumb Section -->
     <div class="page-bredcrumb-menu mediumgray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= $path ?>">Home</a></li>
                                    <li class="breadcrumb-item active">Single Post</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-single-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-blog-post-content m-bot-6">
                            <div class="post-banner">
                                <a href="#"><img src="uploads/<?= $post_row['image_article'] ?>" alt="<?= $post_row['image_article'] ?>"></a>
                            </div>
                            <div class="post-content">
                                <div class="post-inner-content">
                                    <div class="post-tag">
                                    <a href="<?= $path . "/single_category.php?id_categorie=" . $post_row['id_categorie'] ?> "><?= $post_row['nom_categorie'] ?></a>
                                    </div>
                                    <div class="post-author m-bot-2">
                                        <div class="single-author-meta">
                                            <span class="author-avater">
                                            <img src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="image">
                                        </span>
                                        <span>By<a href="<?= $path . "/single_author.php?id_auteur=" . $post_row['id_auteur'] ?> "><?= $post_row['fullname_auteur'] ?></a></span>
                                            <span>on <?= date_format(date_create($post_row['date_article']),'d M Y') ?></span>
                                        </div>
                                    </div>
                                    <h3 class="blog-title"><?= $post_row['title_article'] ?></h3>
                                    <?= $post_row['contenu_article'] ?>
                                </div>
                                <div class="post-footer" data-aos="fade-up">
                                    <div class="social-share-views" data-aos="fade-up">
                                        <div class="post-views">
                                            <a href="#comments"><i class="fa fa-comments"></i>&nbsp;<?= count($nbcomment) ?> Comment(s)</a>
                                        </div>
                                        <!-- Social Share -->
                                        <div class="social-icon-inner">
                                            <ul>
                                                <li><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="http://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-primary-author" data-aos="fade-up">
                                        <div class="primary-author-image">
                                        <img src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="image">
                                        </div>
                                        <h4><a href="<?= $path . "/single_author.php?id_auteur=" . $post_row['id_auteur'] ?> "><?= $post_row['fullname_auteur'] ?></a></h4>
                                        <p><?= $post_row['description_auteur'] ?></p>
                                        <div class="author-socio-profile">
                                            <ul>
                                                <li><a href="<?= $post_row['facebook_auteur'] ?>"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="<?= $post_row['twitter_auteur'] ?>"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="<?= $post_row['linkdin_auteur'] ?>"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a  href="mailto: <?= $post_row['email_auteur'] ?>"><i class="fa fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Post comments -->
                                <div class="single-post-comments" id='comments'>
                                    <div class="comment-wrap-title" data-aos="fade-up">
                                        <h4><?= count($nbcomment) ?> Comment(s)</h4>
                                    </div>
                                    <div class="comment-lists">
                                        <ul>
                                        <?php
                if ($nbcomment > 0) {
                    foreach ($nbcomment as  $row) {
                ?>
                                            <li>
                                                <div class="comment-content" data-aos="fade-up">
                                                    <div class="comment-avater">
                                                        <img src="assets/img/authors/author-2.jpg" alt="author">
                                                    </div>
                                                    <div class="author-comments">
                                                        <div class="comment-name">
                                                            <h5><?= $row['nom_auteur_comentaire'] ?></h5>
                                                            <span><?= date_format(date_create($row['comentaire_date']),'d M Y') ?></span>
                                                        </div>
                                                        <p><?= $row['contenu_commentaire'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                    <?php }}?>
                                        </ul>
                                    </div>
                                    <!-- Comment Box -->
                                    <div class="comments-box p-top-13">
                                        <div class="comment-title p-bot-6" data-aos="fade-up">
                                            <h4>Leave a Comment</h4>
                                            <p>Your email address will not be published. Required field are marked *</p>
                                        </div>
                                        <form action="" method="POST" class="comment-form" data-aos="fade-up">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name*</label>
                                                    <input type="text" name="nom_auteur_comentaire" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email *</label>
                                                    <input type="email" name="email_commentaire" required class="form-control">
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Your comment *</label>
                                                    <textarea name="contenu_commentaire" required cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn bg-primary btn-sm">Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Post Navigator -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <nav class="post-pagination d-flex flex-wrap mt-5">
                                            <?php
                                                if (isset($prev_row)) { ?>
                                                <div class="single-post-pagination d-flex align-items-center" data-aos="fade-up">
                                                    <a href="<?= $path . "/single_post.php?id_article=" . $prev_row['id_article'] ?>" class="post-p-image" style="background: linear-gradient( -41deg, rgb(97,144,232,.7) 1%, rgb(167,191,232,.7) 100%),url('<?='uploads/' . $prev_row["image_article"] ?>') no-repeat scroll center/cover"></a>
                                                    <div class="post-p-content">
                                                        <a href="<?= $path . "/single_post.php?id_article=" . $prev_row['id_article'] ?>" class="p-text text-uppercase">Previous post</a>
                                                        <h6 class="m-0"><a class="pp-title" href="<?= $path . "/single_post.php?id_article=" . $prev_row['id_article'] ?>"><?=$prev_row["title_article"] ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php }else {?>
                                                <div class="single-post-pagination d-flex align-items-center" data-aos="fade-up"></div>
                                            <?php } if (isset($next_row)) { ?>
                                                <div class="single-post-pagination d-flex align-items-center flex-row-reverse" data-aos="fade-up">
                                                    <a href="<?= $path . "/single_post.php?id_article=" . $next_row['id_article'] ?>" class="post-p-image m-0" style="background: linear-gradient( -41deg, rgb(248,87,166,.7) 0%, rgb(255,104,104,.7) 100%),url('<?='uploads/' . $next_row["image_article"] ?>') no-repeat scroll center/cover"></a>
                                                    <div class="post-p-content m-right-3  d-flex align-items-end flex-column">
                                                        <a href="<?= $path . "/single_post.php?id_article=" . $next_row['id_article'] ?>" class="p-text text-uppercase">Next post</a>
                                                        <h6 class="m-0 text-right"><a class="pp-title" href="<?= $path . "/single_post.php?id_article=" . $next_row['id_article'] ?>"><?=$next_row["title_article"] ?></a></h6>
                                                    </div>
                                                </div>
                                            <?php }else {?>
                                                <div class="single-post-pagination d-flex align-items-center flex-row-reverse" data-aos="fade-up"></div>
                                            <?php } ?>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start post sidebar -->
                    <div class="col-lg-4">
                        <!-- Single sidebar widget -->
                        <div class="single-sidebar-post">
                            <div class="sidebarr-title">
                                <h2>About Us</h2>
                            </div>
                            <div class="post-img">
                                <a href="<?= $path . "/single_author.php?id_auteur=" . $post_row['id_auteur'] ?>" class="authorimg mr-3"><img src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="authors"></a>
                            </div>
                            <div class="authorname">
                                <h4><a href="<?= $path . "/single_author.php?id_auteur=" . $post_row['id_auteur'] ?>"><?= $post_row['fullname_auteur'] ?></a></h4>
                            </div>
                            <p><?= $post_row['description_auteur'] ?></p>
                            <div class="widget-content">
                                <ul class="social-icon">
                                <li><a href="<?= $post_row['facebook_auteur'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $post_row['twitter_auteur'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= $post_row['linkdin_auteur'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a  href="mailto: <?= $post_row['email_auteur'] ?>"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Single sidebar widget -->
                        <div class="single-sidebar-post">
                            <div class="sidebarr-title">
                                <h2>Recent Posts</h2>
                            </div>
                            <?php for ($i = 0; $i < 3; $i++) {
                            if (isset($allarticle[$i])) {
                        ?>
                                <div class="recent-post clearfix row">
                                <a href="<?= $path . "/single_post.php?id_article=" . $allarticle[$i]['id_article'] ?>" class="post-thumb"><img src="./uploads/<?= $allarticle[$i]['image_article'] ?>" alt="<?= $allarticle[$i]['image_article'] ?>"></a>
                                <div class="post-meta col-6">
                                    <h3><a href="<?= $path . "/single_post.php?id_article=" . $allarticle[$i]['id_article'] ?>"><?= $allarticle[$i]['title_article'] ?></a></h3>
                                    <a href="<?= $path . "/single_post.php?id_article=" . $allarticle[$i]['id_article'] ?>"><i class="fa fa-calendar"></i><?= date_format(date_create($allarticle[$i]['date_article']),'d M Y') ?></a>
                                </div>
                            </div>
                        <?php }
                        } ?>
                        </div>
                        <!-- Single sidebar widget-->
                        <div class="single-sidebar-post Categories-item">
                            <div class="sidebarr-title">
                                <h2>Categories</h2>
                            </div>
                            <div class="Categories">
                                <ul>
                                <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li><a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?>"><?= $row['nom_categorie'] ?><span>(<?= $row['count'] ?>)</span></a></li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Single sidebar widget -->
                        <div class="newsletter-sidebar-post">
                            <div class="sidebarr-title">
                                <h2>Newsletter</h2>
                            </div>
                            <div class="newsletter-content">
                                <a href="#"><img src="assets/img/icons/text.png" alt="image"></a>
                                <h4>Subscribe to our newsletter</h4>
                                <p>Sign up and receive the latest updates and news through email</p>
                            </div>
                            <div class="newsletter-form">
                                <input class="form-control" type="text" placeholder="your email">
                                <a href="#">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Start post sidebar -->
                </div>
            </div>
        </div>
<?php 
include 'footer.php';
?>