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
    <!--start js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!--end js-->
</head>

<body>
    <?php

    include 'admin_header.php';
    upload_image();

    $method = "submit";
    $display = "none";

    if (isset($_REQUEST['submit'])) {
        $col = array("nom_categorie", "image_categorie");
        $val = array("'" . $_REQUEST["nom_categorie"] . "'", "'" . $_FILES['picture']['name'] . "'");
        add_item("categorie", $col, $val);
        header("Location: admin_category.php");
    }

    if (isset($_REQUEST['update'])) {
        if (($_FILES['picture']['name'] == "")) {
            $val = array("'" . $_REQUEST["nom_categorie"] . "'", "'" . $_REQUEST['image_categorie'] . "'");
        } else {
            $val = array("'" . $_REQUEST["nom_categorie"] . "'", "'" . $_FILES['picture']['name'] . "'");
        }
        $col = array("nom_categorie", "image_categorie");

        up_item("categorie", array_combine($col, $val), "id_categorie = " . $_GET["id_categorie"]);
        header("Location: admin_category.php");
    }

    $post_row['nom_categorie'] = "";
    $post_row['image_categorie'] = "";

    if (isset($_REQUEST["id_categorie"])) {
        $display = "block";
        $method = "update";
        $category = get_item("*", "categorie", " WHERE id_categorie = " . $_GET['id_categorie']);
        while ($row = $category->fetch(PDO::FETCH_ASSOC)) {
            $post_row = array_merge($row);
        }
    }
    ?>
    <div class="col-11 pl-0">
        <form action="" method="POST" enctype="multipart/form-data">
            <section class=" p-5 mt-5">
                <div class="card bg-white p-0" style="min-height:80vh;">
                    <div class="card-body">
                        <h5 class="card-title text-center display-4 p-4">Categorie</h5>
                        <div>
                            <img class="w-100" style="height:300px" name="image_categorie" id="bash" style="display:<?= $display ?>" src="uploads/<?= $post_row['image_categorie'] ?>" alt="">
                        </div>
                        <div class="form-group py-3">
                            <input type="text" value="<?= $post_row['nom_categorie'] ?>" name="nom_categorie" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Categorie" />
                        </div>

                        <div class="custom-file py-4">
                            <input type="file" class="custom-file-input " onchange="readURL(this);" name="picture" id="picture" accept="image/*" />
                            <label class="custom-file-label" for="picture">Choose Image</label>
                        </div>

                        <div class="form-group m-0 py-4">
                            <button type="submit" name="<?= $method ?>" class="btn btn-primary w-100">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <script>
        $(document).ready(function() {

            $('input[type="file"]').change(function(e) {

                var fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').html(fileName);

            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#bash')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>