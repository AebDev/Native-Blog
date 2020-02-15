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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="src/jquery.richtext.min.js"></script>
    <!--text editor script-->

    <script src="script.js"></script>
    <!--end js-->
</head>

<body>
    <?php
    include 'functions.php';
    upload_image();
    $category = get_item("categorie");
    $author = get_item("auteur");
    if (isset($_REQUEST['submit'])) {
        $col = array("title_article", "contenu_article", "image_article", "date_article", "id_categorie", "id_auteur");
        $val = array("'" . $_REQUEST["title"] . "'", "'" . $_REQUEST["example"] . "'", "'" . $_FILES['picture']['name'] . "'", "'" . date('Y-m-d H:i:s') . "'", $_REQUEST["categorie"], $_REQUEST["auteur"]);
        add_item("article", $col, $val);
    }
    ?>
    <div class="col-11 pl-0 p-5 bg-light">

        <section class="container">
            <form class="row p-5" action="" method="post" enctype="multipart/form-data">
                <div class="col-8">
                    <div class="card px-3">
                        <div class="form-group p-3">
                            <label for="FormControlInput1" class="display-4">Article</label>
                            <input type="text" name="title" class="form-control form-control-lg" id="FormControlInput1" placeholder="Titre" />
                        </div>
                        <div class="form-group p-3">
                            <div class="page-wrapper box-content">
                                <textarea class="content" name="example"></textarea>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $(".content").richText();
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-4 row px-3">
                    <div class="card col-12 mb-3">
                        <div class="card-body">
                            <div class="form-group" style="background-image: url('image/cloud.svg');background-position: center;
                                background-repeat: no-repeat;">
                                <label for="picture" style="cursor: pointer;" class="display-4 p-5">Select Image..</label>
                                <input type="file" class="form-control d-none" name="picture" id="picture" value="Upload" />
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect1">Auteur</label>
                                <select class="custom-select mr-sm-2" name="auteur" id="inlineFormCustomSelect1">
                                    <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <option value="<?= $row['id_categorie'] ?>"><?= $row["nom_categorie"] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect2">Categorie</label>
                                <select class="custom-select mr-sm-2" name="categorie" id="inlineFormCustomSelect2">
                                    <?php while ($row = $author->fetch(PDO::FETCH_ASSOC)) { ?>

                                        <option value="<?= $row['id_auteur'] ?>"><?= $row["fullname_auteur"] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 p-0 ">
                        <div class="form-group m-0">
                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>

</html>