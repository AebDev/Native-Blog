<?php

include 'header.php';
?>
<!--++++++++ Start 404 Error section ++++++++-->
<div class="w-100 min-vh-100 d-flex align-items-center error-sec py-5">
        <div class="container w-100">
            <div class="row align-items-center flex-column-reverse flex-lg-row">
                <div class="col-lg-7" data-aos="fade-up">
                    <h1>Error 404</h1>
                    <p>Sorry for the inconvenience, We can not find the pages you are looking for :-(</p>
                    <a href="<?= $path ?>" class="btn bg-primary btn-md rounded-50 mt-5">BACK TO HOME</a>
                </div>
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div data-aos="fade-left">
                        <img src="assets/img/404.png" alt="erro">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

include 'footer.php';


?>