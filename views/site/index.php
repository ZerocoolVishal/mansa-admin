<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Home';

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
        <h1>Welcome to Manasa</h1>
        <h2>Rehabilitation & De-addiction Center</h2>
        <div class="d-flex align-items-center">
            <i class="bx bxs-right-arrow-alt get-started-icon"></i>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- main -->
<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                    <div class="content">
                        <h3>Why Choose Manasa?</h3>
                        <p>
                            Manasa is one of the licensed re-habilitation & de-addiction center providing 24*7 neuro psychological services to the patients.
                        </p>
                        <p>
                            It is also one of its kind providing neuro phychiatric care wth availability of phychiatrist & trained/qualified nursing staff 24*7.
                        </p>
                        <div class="text-center">
                            <?= Html::a('Learn More <i class="bx bx-chevron-right"></i>', ['site/about-us'], ['class' => 'more-btn']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 d-flex">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Authentic SERVICES</h4>
                                    <p>
                                       Licensed re-habilitation facilities in sociol eco friendly environment
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Availability of QUALITY care</h4>
                                    <p>24*7 professional care under qualified doctors & nurses</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-atom"></i>
                                    <h4>Approach to FUNCTIONAL recovery</h4>
                                    <p>Enhancement of psychological well-being and vocational skills.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <?= $this->render('../layouts/website/_about') ?>
    <!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <?= $this->render('../layouts/website/_doctors') ?>
    <!-- End Team Section -->

    <!-- ======= Services Section ======= -->
    <?= $this->render('../layouts/website/_services') ?>
    <!-- End Services Section -->

    <!-- ======= Values Section ======= -->
    <?= $this->render('../layouts/website/_values') ?>
    <!-- End Values Section -->

    <!-- ======= Testimonials Section ======= -->
    <?= $this->render('../layouts/website/_testimonies') ?>
    <!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 data-aos="fade-up">Contact</h2>
                <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="row justify-content-center">
                        <div class="col-12 mt-4" data-aos="fade-up">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p><?= Yii::$app->params['address'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 mt-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="info-box">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p><?= Yii::$app->params['contact_email'] ?></p>
                                <p><?= Yii::$app->params['contact_email'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 mt-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="info-box">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p><?= Yii::$app->params['mobile_no'] ?></p>
                                <p><?= Yii::$app->params['landline_no'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="col-xl-9 col-lg-12 mt-4">
                            <form style="padding: 85px 30px" action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- End Contact Section -->

</main>
<!-- End #main -->
