<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--start css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/slider.css" />
    <link rel="stylesheet" href="css/animation.css" />

    <!--end css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/richtext.min.css" />

    <!--start js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--text editor script-->

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <!--text editor script-->


    <script src="script.js"></script>
    <!--end js-->
</head>

<body>
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
        $val = array("'" . $_REQUEST["title"] . "'", "'" . $_REQUEST["example"] . "'", "'" . $_FILES['picture']['name'] . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
        add_item("article", $col, $val);
        header("Location: admin_article.php");
    }

    if (isset($_REQUEST['update'])) {

        if (($_FILES['picture']['name'] == "")) {
            $val = array("'" . $_REQUEST["title"] . "'", "'" . $_REQUEST["example"] . "'", "'" . $_REQUEST['image_article'] . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
        } else {
            $val = array("'" . $_REQUEST["title"] . "'", "'" . $_REQUEST["example"] . "'", "'" . $_FILES['picture']['name'] . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
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
                            <script>
                                $(document).ready(function() {
                                    $(".content").richText();
                                });
                            </script>
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
    <!--start js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--text editor script-->


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