<?php

include 'admin_header.php';
upload_image();
$category = get_item("*", "categorie", "");
$author = get_item("*", "auteur", "");
$method = "submit";
$image_name = "cloud.svg";
$test = "";
if (isset($_REQUEST['submit'])) {
    $col = array("title_article", "contenu_article", "image_article", "date_article", "id_categorie", "id_auteur");
    $val = array("'" . validation($_REQUEST["title"]) . "'", "'" . para_validation($_REQUEST["example"]) . "'", "'" . validation($_FILES['picture']['name']) . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
    add_item("article", $col, $val);
    header("Location: admin_article.php");
}

if (isset($_REQUEST['update'])) {

    if (($_FILES['picture']['name'] == "")) {
        $val = array("'" . validation($_REQUEST["title"]) . "'", "'" . para_validation($_REQUEST["example"]) . "'", "'" . validation($_REQUEST['image_article']) . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
    } else {
        $val = array("'" . validation($_REQUEST["title"]) . "'", "'" . para_validation($_REQUEST["example"]) . "'", "'" . validation($_FILES['picture']['name']) . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
    }

    $col = array("title_article", "contenu_article", "image_article", "date_article", "id_categorie", "id_auteur");

    up_item("article", array_combine($col, $val), "id_article = " . $_REQUEST["id_article"]);
    header("Location: admin_article.php");
}
$post_row['title_article'] = "";
$post_row['contenu_article'] = "";
$post_row['id_categorie'] = "";
$post_row['id_auteur'] = "";
$post_row['image_article'] = "";
if (isset($_REQUEST["id_article"])) {

    $method = "update";
    $article = get_item("*", "article", " WHERE id_article = " . $_REQUEST['id_article']);
    while ($row = $article->fetch(PDO::FETCH_ASSOC)) {
        $post_row = array_merge($row);
    }
    $image_name = $post_row['image_article'];
}

?>
<div class="col-11 pl-0 p-5">

    <section class="container">
        <form class="row p-5" action="" method="post" enctype="multipart/form-data">
            <div class="col-8">
                <div class="card px-3">
                    <div class="form-group p-3">
                        <label for="FormControlInput1" class="display-4">Article</label>
                        <input type="text" value="<?= $post_row['title_article'] ?>" name="title" class="form-control form-control-lg" id="FormControlInput1" placeholder="Titre" />
                    </div>
                    <div class="form-group p-3">
                        <div class="page-wrapper box-content ">

                            <textarea class="content" name="example"><?= $post_row['contenu_article'] ?></textarea>
                            <script>
                                CKEDITOR.replace('example');
                            </script>
                        </div>

                    </div>
                </div>
            </div>
            <input class="d-none" type="text" name="image_article" value="<?= $post_row['image_article'] ?>">
            <div class="col-4 row px-3">
                <div class="card col-12 mb-3">
                    <div class="card-body">
                        <div class="form-group" id="imageArticle" style="background-image: url('uploads/<?= $image_name ?>');background-position: center;
                                background-repeat: no-repeat;background-size:100%;">
                            <label style="color: #00000001" for="picture" style="cursor: pointer;" class="display-4 p-5">Select Image..</label>
                            <input type="file" onchange="readURL(this);" class="form-control" name="picture" id="picture" value="Upload" accept="image/*" />

                        </div>
                    </div>
                </div>


                <div class="card col-12 mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect1">Categorie</label>
                            <select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect1">

                                <?php
                                while ($row = $category->fetch(PDO::FETCH_ASSOC)) {
                                    $test = "";
                                    if ($post_row['id_categorie'] == $row['id_categorie']) {
                                        $test = " selected ";
                                    }
                                ?>
                                    <option value="<?= $row['id_categorie'] ?>" <?= $test ?>><?= $row["nom_categorie"] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card col-12 mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect2">Auteur</label>
                            <select class="custom-select mr-sm-2" name="auteur" id="inlineFormCustomSelect2">
                                <?php while ($row = $author->fetch(PDO::FETCH_ASSOC)) {
                                    $test = "";
                                    if ($post_row['id_auteur'] == $row['id_auteur']) {
                                        $test = " selected ";
                                    } ?>

                                    <option value="<?= $row['id_auteur'] ?>" <?= $test ?>><?= $row["fullname_auteur"] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card col-12 p-0 ">
                    <div class="form-group m-0">
                        <button type="submit" name="<?= $method ?>" class="btn btn-primary w-100">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imageArticle')
                    .css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>

</html>