<?php

/**
 * @var $this \yii\web\View
*/

use \yii\helpers\Url;

$this->registerCss("
    
    .bg-hero-card {
        padding-top: 1rem !important;
        background-color: #ffffff40!important;
    }

");

?>
<!-- HERO-9
============================================= -->
<section id="hero-9" class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">


        <!-- SLIDER CONTENT -->
        <div class="carousel-inner">


            <!-- SLIDE 1 -->
            <div id="carousel-slide-1" class="bg-fixed carousel-item active" style='background-image: url("<?= Url::to("@web/images/banner1.jpg") ?>")'>
                <div class="mask d-flex align-items-center">
                    <div class="container">
                        <div class="row">

                            <!-- SLIDE-1 TEXT -->
                            <div class="col-md-8 col-lg-7 bg-hero-card">
                                <div class="hero-txt">

                                    <!-- Title -->
                                    <h5 class="brand-color">Welcome to Mannsparsh</h5>
                                    <h2 class="">Healthy mind for healthy body</h2>

                                    <!-- Text -->
                                    <p class=" p-md">
                                        let's focus on psychological well being through early diagnosis and timely  treatment
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END SLIDE 1 -->

            <!-- SLIDE 2 -->
            <div id="carousel-slide-2" class="bg-fixed carousel-item" style='background-image: url("<?= Url::to("@web/images/concentraction.jpg") ?>")'>
                <div class="mask d-flex align-items-center">
                    <div class="container">
                        <div class="row">

                            <!-- SLIDE-2 TEXT -->
                            <div class="col-md-8 col-lg-7">
                                <div class="hero-txt">

                                    <!-- Title -->
                                    <h5 class="brand-color">Welcome to Mannsparsh</h5>
                                    <h2 class="white-color">Growing brains needs to be trained</h2>

                                    <!-- Text -->
                                    <p class="white-color p-md">
                                        let's help young minds to build a future by recognising their strengths and weaknesses
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END SLIDE 2 -->

            <!-- SLIDE 3 -->
            <div id="carousel-slide-3" class="bg-fixed carousel-item" style='background-image: url("<?= Url::to("@web/images/banner2.jpg") ?>")'>
                <div class="mask d-flex align-items-center">
                    <div class="container">
                        <div class="row">

                            <!-- SLIDE-3 TEXT -->
                            <div class="col-md-8 col-lg-7 bg-hero-card">
                                <div class="hero-txt">

                                    <!-- Title -->
                                    <h5 class="">Welcome to Mannsparsh</h5>
                                    <h2 class="">Healthy ageing</h2>

                                    <!-- Text -->
                                    <p class="p-md">
                                        Age related memory loss or Dementia?
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>	<!-- END SLIDE 3 -->


        </div>	<!-- END SLIDER CONTENT -->


        <!-- SLIDER NAVIGATION -->
        <div class="carousel-nav white-nav">

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

        </div>


    </div>
</section>	<!-- END HERO-9 -->