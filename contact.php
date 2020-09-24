<?php

include 'header.php'; ?>

<!-- Breadcrumb Section -->
<div class="page-bredcrumb-menu mediumgray-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= $path ?>">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb Section -->
    <!--+++++++ Stat Contact Section ++++++++++++-->
    <section class="contact-page-wrapper section-padding">
        <div class="container">
            <div class="contact-map map-two w-100">
                <div id="map" data-aos="fade-up"></div>
            </div>
            <div class="contact-page-Section">
                <div class="contact-title pb-5" data-aos="fade-up">
                    <h3>our contact</h3>
                    <h4><span>Dont't be a stanger</span>.just say "hello",<br />or drop us a note.</h4>
                </div>
                <div class="contact-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-address" data-aos="fade-down">
                                <h5>mohcine.aeb@gmail.com</h5>
                                <h5>+212 6 45 57 95 78</h5>
                                <p class="py-4"><span class="mr-2"><i class="fa fa-map-marker"></i></span>Casablanca, Morocco</p>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left">
                            <!-- Contact form -->
                            <form class="contact-form contact-form-two" action="mail.php" method="post">
                                <input class="form-control" type="text" placeholder="Name" name="name" required>
                                <input class="form-control" type="email" placeholder="Email" name="email" required>
                                <textarea class="form-control text-area" rows="3" cols="40" name="message" placeholder="Message"></textarea>
                                <input class="btn btn-primary" type="submit" name="submit" value="send massage">
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

include 'footer.php';


?>