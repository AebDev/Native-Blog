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
    <main>
        <section class="bg-light p-5">
            <h2>Articles</h2>
            <div class="p-3">
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-plus"></i> Ajouter
                </button>
            </div>
            <table class="table table-hover bg-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Date</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id="" /></th>
                        <td><img src="image/image1.jpg" alt="" style="width:100px" /></td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>@mdo</td>
                        <td>Categorie 1</td>
                        <td>14/02/2020</td>
                        <td>
                            <button class="btn btn-warning " type="submit">
                                <i class="fas fa-pen"></i> Modifer
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger " type="submit">
                                <i class="fas fa-trash-alt "></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id="" /></th>
                        <td>
                            <img src="image/image2.jpg" alt="" style="width:100px" />
                        </td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>@mdo</td>
                        <td>Categorie 1</td>
                        <td>14/02/2020</td>
                        <td>
                            <button class="btn btn-warning " type="submit">
                                <i class="fas fa-pen"></i> Modifer
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger " type="submit">
                                <i class="fas fa-trash-alt "></i> Supprimer
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id="" /></th>
                        <td>
                            <img src="image/image3.jpg" alt="" style="width:100px;" />
                        </td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>@mdo</td>
                        <td>Categorie 1</td>
                        <td>14/02/2020</td>
                        <td>
                            <button class="btn btn-warning " type="submit">
                                <i class="fas fa-pen"></i> Modifer
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger " type="submit">
                                <i class="fas fa-trash-alt "></i> Supprimer
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>