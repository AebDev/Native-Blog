<?php
include 'admin_header.php';
$author = get_item("*", "auteur", "");

if (isset($_GET["id_auteur"])) {
    del_item("auteur", "id_auteur = " . $_GET["id_auteur"]);
    header("Location: admin_author.php");
}
?>
<main class="l-main">
        <div class="content-wrapper content-wrapper--with-bg">
    <h2>Auteurs</h2>
    <div class="p-3">
        <a href="<?= $path ?>/admin_up_author.php" class="btn btn-primary" style="margin-bottom: 20px;">
            <i class="fas fa-plus"></i> Ajouter
        </a>
    </div>
    <table class="table table-hover bg-white " style="background-color: #fff;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Afficher</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $author->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><?= $row['id_auteur'] ?></th>
                    <td><img src="uploads/<?= $row['avatar_auteur'] ?>" alt="<?= $row['avatar_auteur'] ?>" style="width:100px" /></td>
                    <td><?= $row['fullname_auteur'] ?></td>
                    <td><?= $row['email_auteur'] ?></td>
                    <td>
                        <a href="<?= $path . "/single_author.php?id_auteur=" . $row['id_auteur'] ?> " class="btn btn-success ">
                            <i class="far fa-eye"></i> Afficher
                        </a>
                    </td>
                    <td>
                        <a href="<?= $path . "/admin_up_author.php?id_auteur=" . $row['id_auteur'] ?> " class="btn btn-warning ">
                            <i class="fas fa-pen"></i> Modifer
                        </a>
                    </td>
                    <td>
                        <a href="<?= $path . "/admin_author.php?id_auteur=" . $row['id_auteur'] ?> " class="btn btn-danger ">
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