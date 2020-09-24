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

$authors = get_item("*", "auteur", " LIMIT ".$start_from.','.$record_per_page);

$path = get_path();

$card_color = ['tag-blue','tag-purple','tag-pink','tag-nevy','tag-violet','tag-carrot','tag-rosepink'];

$active_path = 'authors.php?';

$page_query = get_item("count(*) as count", "auteur", "");
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
                                    <li class="breadcrumb-item active">Authors</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb Section -->
        <div class="authors-page-sec section-padding">
            <div class="container">
                <div class="page-title mb-5">
                    <h3>Our Authors</h3>
                </div>
                <div class="authors-wrap">

                <?php while ($row = $authors->fetch(PDO::FETCH_ASSOC)) { ?>
                    <!-- Single Author -->
                    <div class="author-item no-cover" data-aos="flip-right">
                        <div class="ai-head">
                            <a href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?>" class="ai-img"><img src="uploads/<?= $row['avatar_auteur'] ?>" alt="authors"></a>
                            <ul class="header-social d-flex justify-content-center">

                            <li><a href="<?= $row['facebook_auteur'] ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= $row['twitter_auteur'] ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= $row['linkdin_auteur'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a  href="mailto: <?= $row['email_auteur'] ?>"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                        <div class="ai-body">
                            <h5 class="m-0"><a class="a-name" href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?>"><?= $row['fullname_auteur'] ?></a></h5>
                            
                            <p><?= $row['description_auteur'] ?></p>
                        </div>
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