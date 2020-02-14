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
    include 'admin_header.php';
    ?>
    <div class="col-11 pl-0 p-5 bg-light">
        <section class="container">
            <form class="row p-5">
                <div class="col-8">
                    <div class="card px-3">
                        <div class="form-group p-3">
                            <label for="FormControlInput1" class="display-4">Article</label>
                            <input type="text" class="form-control form-control-lg" id="FormControlInput1" placeholder="Titre" />
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
                                <label for="imageUpload" style="cursor: pointer;" class="display-4 p-5">Select Image..</label>
                                <input type="file" class="form-control d-none" id="imageUpload" value="Upload" />
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect1">Auteur</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect1">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect2">Categorie</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect2">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card col-12 p-0 ">
                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary w-100">
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