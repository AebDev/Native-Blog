<?php
include 'admin_header.php';
$category = get_item("*", "categorie", "");

if (isset($_GET["id_categorie"])) {
    
    
        del_item("categorie", "id_categorie = " . $_GET["id_categorie"]);
        header("Location: admin_category.php");
    
}
?>

<main class="l-main">
        <div class="content-wrapper content-wrapper--with-bg">
    <h2>Categories</h2>
    <div class="p-3">
        <a href="<?= $path ?>/admin_up_category.php" class="btn btn-primary" style="margin-bottom: 20px;">

            <i class="fas fa-plus"></i> Ajouter

        </a>
    </div>
    <table class="table table-hover bg-white" style="background-color: #fff;">
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
                    <th scope="row"><?= $row['id_categorie'] ?></th>
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
    </div>

</main>
<?php 
include 'admin_footer.php';
?>