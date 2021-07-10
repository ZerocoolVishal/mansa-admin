<?php

use yii\helpers\Html;

?>
<!-- HEADER
============================================= -->
<header id="header-2" class="header ">


    <!-- MOBILE HEADER -->
    <div class="wsmobileheader clearfix">
        <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        <span class="smllogo">
                <?= Html::img('@web/images/logo.png', ['width' => '180', 'alt' => 'mobile-logo']) ?>
        </span>
        <a href="tel:0251-2358255" class="callusbtn"><i class="fas fa-phone"></i></a>
    </div>


    <!-- HEADER WIDGETS -->
    <div class="hero-widget clearfix">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- LOGO IMAGE -->
                <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
                <div class="col-md-5 col-xl-6">
                    <div class="desktoplogo">
                        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                            <?= Html::img('@web/images/logo.png', ['width' => '250', 'alt' => 'logo']) ?>
                        </a>
                    </div>
                </div>

                <!-- WIDGETS -->
                <div class="col-md-7 col-xl-6">
                    <div class="row">

                        <!-- Emergency Cases Widget
                        <div class="col-md-6">
                            <div class="header-widget icon-xs">
                                <span class="flaticon-039-emergency-call-1 blue-color"></span>
                                <div class="header-widget-txt">
                                    <p>Emergency Cases</p>
                                    <p class="header-widget-phone steelblue-color">1-800-123-4560</p>
                                </div>
                            </div>
                        </div>-->

                        <!-- Working Hours Widget -->
                        <div class="col-md-6">
                            <div class="header-widget icon-xs">
                                <span class="flaticon-092-clock brand-color"></span>
                                <div class="header-widget-txt">
                                    <p class="txt-400">Mon – Sat : - 01:00 PM - 03:00 PM <br> 07:30 PM - 09:30 PM</p>
                                    <p class="lightgrey-color">Sun : - Only emergency services</p>
                                </div>
                            </div>
                        </div>

                        <!-- Location Widget -->
                        <div class="col-md-6">
                            <div class="header-widget icon-xs">
                                <span class="flaticon-021-hospital-9 brand-color"></span>
                                <div class="header-widget-txt">
                                    <p class="txt-400"><?= Yii::$app->params['landline_no'] ?>, <?= Yii::$app->params['mobile_no'] ?></p>
                                    <p class="lightgrey-color">Kalyan EAST</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>	<!-- END WIDGETS -->

            </div>
        </div>
    </div>	<!-- END HEADER WIDGETS -->


    <!-- NAVIGATION MENU -->
    <div class="wsmainfull menu clearfix">
        <div class="wsmainwp clearfix">

            <!-- LOGO IMAGE -->
            <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
            <div class="desktoplogo pt-0">
                <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                    <?= Html::img('@web/images/logo.png', ['height' => '70', 'alt' => 'header-logo']) ?>
                </a>
            </div>

            <!-- MAIN MENU -->
            <nav class="wsmenu clearfix">
                <ul class="wsmenu-list">

                    <li class="nl-simple" aria-haspopup="true"><?= Html::a('Home', ['site/index']) ?></li>

                    <li class="nl-simple" aria-haspopup="true"><?= Html::a('About Us', ['site/about-us']) ?></li>

                    <li class="nl-simple" aria-haspopup="true"><?= Html::a('Doctors', ['site/doctors']) ?></li>

                    <!-- MEGAMENU -->
                    <li aria-haspopup="true">
                        <a href="#">Blog <span class="wsarrow"></span></a>
                        <div class="wsmegamenu clearfix">
                            <div class="container">
                                <div class="row">


                                    <!-- MEGAMENU QUICK LINKS -->
                                    <ul class="col-lg-3 col-md-12 col-xs-12 link-list">
                                        <?php foreach (\app\helpers\AppHelpers::getBlogCategories() as $key => $category): ?>
                                        <li class="title">Categories:</li>
                                        <li><?= Html::a($category, ['site/blogs', 'category_id' => $key]) ?></li>
                                        <?php endforeach; ?>
                                    </ul>


                                    <!-- MEGAMENU FEATURED NEWS -->
                                    <div class="col-lg-5 col-md-12 col-xs-12">

                                        <!-- Title -->
                                        <h3 class="title">Featured News:</h3>

                                        <?php
                                        $featuredBlog = \app\helpers\AppHelpers::getPopularBlog(1);
                                        if($featuredBlog[0]):
                                            $featuredBlog = $featuredBlog[0];
                                        ?>
                                            <!-- Image -->
                                            <div class="fluid-width-video-wrapper">
                                                <?= Html::img($featuredBlog['image'], ['width' => '100%', 'class' => 'img-fluid', 'alt' => 'blog-post-image']) ?>
                                            </div>

                                            <!-- Text -->
                                            <h5 class="h5-xs">
                                                <?= Html::a($featuredBlog['title'], ['site/blog-view', 'id' => $featuredBlog['id']]) ?>
                                            </h5>
                                            <p class="wsmwnutxt">
                                                <?= substr(Html::encode($featuredBlog['content']), 0, 200) ?>...
                                            </p>
                                        <?php endif; ?>

                                    </div>	<!-- END MEGAMENU FEATURED NEWS -->


                                    <!-- MEGAMENU LATEST NEWS -->
                                    <div class="col-lg-4 col-md-12 col-xs-12">

                                        <!-- Title -->
                                        <h3 class="title">Latest News:</h3>

                                        <!-- Latest News -->
                                        <ul class="latest-news">

                                            <?php foreach (\app\helpers\AppHelpers::getPopularBlog() as $key => $blog): ?>
                                                <li class="clearfix d-flex align-items-center">

                                                    <!-- Image -->
                                                    <?= Html::img($blog['image'], ['class' => 'img-fluid', 'alt' => 'blog-post-preview', 'style' => "height: auto;"]) ?>

                                                    <!-- Text -->
                                                    <div class="post-summary">
                                                        <?= Html::a($blog['title'], ['site/blog-view', 'id' => $blog['id']]) ?>
                                                        <p><?= date('M d, Y', strtotime($blog['date'])) ?></p>
                                                    </div>

                                                </li>
                                            <?php endforeach; ?>

                                        </ul>
                                    </div>	<!-- END MEGAMENU LATEST NEWS -->


                                </div>  <!-- End row -->
                            </div>  <!-- End container -->
                        </div>  <!-- End wsmegamenu -->
                    </li>
                    <!-- END MEGAMENU -->

                    <li class="nl-simple" aria-haspopup="true"><?= Html::a('Contact Us', ['site/contact-us']) ?></li>

                    <!-- CUSTOM PAGES FROM BACKEND -->
                    <?php foreach (\app\helpers\AppHelpers::getPagesMenu() as $page): ?>

                        <li class="nl-simple" aria-haspopup="true"><?= Html::a($page->title, ['site/page', 'id' => $page->page_id]) ?></li>

                    <?php endforeach; ?>

                    <!-- HIDDEN NAVIGATION MENU BUTTON -->
                    <li class="nl-simple header-btn" aria-haspopup="true">
                        <?= Html::a('Book An Appointment', ['site/book-appointment'], ['class' => 'blue-hover']) ?>
                    </li>

                </ul>

            </nav>	<!-- END MAIN MENU -->


            <!-- NAVIGATION MENU BUTTON -->
            <div class="header-button">
                <span class="nl-simple header-btn blue-hover">
                    <?= Html::a('Book An Appointment', ['site/book-appointment']) ?>
                </span>
            </div>


        </div>
    </div>	<!-- END NAVIGATION MENU -->


</header>
<!-- END HEADER -->