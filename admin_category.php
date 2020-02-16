<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    include 'functions.php';
    $category = get_item("*", "categorie", "");
    $path = get_path();
    if (isset($_GET["id_categorie"])) {
        del_item("categorie", "id_categorie = " . $_GET["id_categorie"]);
        header("Location: admin_category.php");
    }
    ?>
    <main>
        <form action="" method="post">
            <section class="bg-light p-5">
                <h2>Categories</h2>
                <div class="p-3">
                    <a href="<?= $path ?>/admin_up_category.php" class="btn btn-primary">

                        <i class="fas fa-plus"></i> Ajouter

                    </a>
                </div>
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Afficher</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)) { ?>

                            <tr>
                                <th scope="row"><input type="checkbox" value="<?= $row['id_categorie'] ?>" name="id_category" id="" /></th>
                                <td><img src="uploads/<?= $row['image_categorie'] ?>" alt="<?= $row['image_categorie'] ?>" style="width:100px" /></td>

                                <td><?= $row['nom_categorie'] ?></td>

                                <td>
                                    <a href="<?= $path . "/single_category.php?id_categorie=" . $row['id_categorie'] ?> " class="btn btn-success ">
                                        <i class="far fa-eye"></i> Afficher
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= $path . "/admin_up_category.php?id_categorie=" . $row['id_categorie'] ?> " class="btn btn-warning ">
                                        <i class="fas fa-pen"></i> Modifer
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= $path . "/admin_category.php?id_categorie=" . $row['id_categorie'] ?> " class="btn btn-danger ">
                                        <i class="fas fa-trash-alt "></i> Supprimer
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </section>
        </form>
    </main>
</body>

</html>