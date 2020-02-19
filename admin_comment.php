<?php
include 'admin_header.php';
$comment = get_item("*", "comentaire", "");

if (isset($_GET["id_comentaire"])) {

    if (isset($_GET["comentaire_visibility"])) {

        if ($_GET["comentaire_visibility"]) {

            $_GET["comentaire_visibility"] = 0;
        } else {

            $_GET["comentaire_visibility"] = 1;
        }

        up_item("comentaire", "comentaire_visibility = " . $_GET["comentaire_visibility"], "id_comentaire = " . $_GET["id_comentaire"]);
        header("Location: admin_comment.php");
    } else {

        del_item("comentaire", "id_comentaire = " . $_GET["id_comentaire"]);
        header("Location: admin_comment.php");
    }
}
?>
<section class=" p-5 mt-5 col-11">
    <h2>Comentaire</h2>

    <table class="table table-hover bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id Article</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Comentaire</th>
                <th scope="col">Action</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $comment->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><input type="checkbox" value="<?= $row['id_comentaire'] ?>" name="id_comentaires" id="" /></th>
                    <td><?= $row['id_article'] ?></td>
                    <td><?= $row['nom_auteur_comentaire'] ?></td>
                    <td><?= $row['email_commentaire'] ?></td>
                    <td class="break-word"><?= $row['contenu_commentaire'] ?></td>

                    <td>
                        <?php if ($row['comentaire_visibility']) {
                            echo "<a href='" . $path . "/admin_comment.php?id_comentaire=" . $row['id_comentaire'] . "&comentaire_visibility=" . $row['comentaire_visibility'] . "' class='btn btn-warning'>
                            <i class='fas fa-eye-slash'></i> Hide</a>";
                        } else {
                            echo "<a href='" . $path . "/admin_comment.php?id_comentaire=" . $row['id_comentaire'] . "&comentaire_visibility=" . $row['comentaire_visibility'] . "' class='btn btn-success'>
                            <i class='far fa-eye'></i> Show</a>";
                        } ?>

                    </td>
                    <td>
                        <a href="<?= $path . "/admin_comment.php?id_comentaire=" . $row['id_comentaire'] ?> " class="btn btn-danger ">
                            <i class="fas fa-trash-alt "></i> Supprimer
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</section>
</body>

</html>