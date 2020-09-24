<?php
include 'admin_header.php';
upload_image();
$method = "submit";
$display = "none";

if (isset($_REQUEST['submit'])) {
    $col = array("fullname_auteur", "email_auteur", "avatar_auteur");
    $val = array("'" . validation($_REQUEST["name_auteur"]) . "'", "'" . validation($_REQUEST["email_auteur"]) . "'", "'" . validation($_FILES['picture']['name']) . "'");
    add_item("auteur", $col, $val);
    header("Location: admin_author.php");
}

if (isset($_REQUEST['update'])) {

    if (($_FILES['picture']['name'] == "")) {
        $val = array("'" . validation($_REQUEST["name_auteur"]) . "'", "'" . validation($_REQUEST["email_auteur"]) . "'", "'" . validation($_REQUEST['avatar_label']) . "'");
    } else {
        $val = array("'" . validation($_REQUEST["name_auteur"]) . "'", "'" . validation($_REQUEST["email_auteur"]) . "'", "'" . validation($_FILES['picture']['name']) . "'");
    }

    $col = array("fullname_auteur", "email_auteur", "avatar_auteur");

    up_item("auteur", array_combine($col, $val), "id_auteur = " . $_REQUEST["id_auteur"]);
    header("Location: admin_author.php");
}

$post_row["fullname_auteur"] = "";
$post_row["email_auteur"] = "";
$post_row["avatar_auteur"] = "chose avatar...";

if (isset($_REQUEST["id_auteur"])) {
    $display = "block";
    $method = "update";
    $category = get_item("*", "auteur", " WHERE id_auteur = " . $_REQUEST['id_auteur']);
    while ($row = $category->fetch(PDO::FETCH_ASSOC)) {
        $post_row = array_merge($row);
    }
}
?>
<main class="l-main">
        <div class="content-wrapper content-wrapper--with-bg">
        <form action="" method="post" enctype="multipart/form-data">
        <section class=" p-5 mt-5 ">
            <div class="card bg-white p-0" style="min-height:80vh;">
                <div class="card-body">
                    <h5 class="card-title text-center display-4 p-4">Auteur</h5>
                    <div class="text-center">
                        <img style="width:200px;height:200px;" class="text-center rounded-circle" id="bash" style="display:<?= $display ?>" src="uploads/<?= $post_row['avatar_auteur'] ?>" alt="">
                    </div>
                    <div class="form-group py-3">
                        <input type="text" value="<?= $post_row['fullname_auteur'] ?>" name="name_auteur" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Full Name" />
                    </div>
                    <div class="form-group py-3">
                        <input type="email" value="<?= $post_row['email_auteur'] ?>" name="email_auteur" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Email" />
                    </div>

                    <div class="custom-file py-4">
                        <input type="file" class="custom-file-input " onchange="readURL(this);" name="picture" id="picture" accept="image/*" />
                        <label class="custom-file-label" for="picture"><?= $post_row['avatar_auteur'] ?></label>
                    </div>
                    <input type="text" style="display: none" name="avatar_label" value="<?= $post_row['avatar_auteur'] ?>" id="">

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
</main>
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
<?php 
include 'admin_footer.php';
?>