<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <ul>
                <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com"><?= Yii::$app->params['contact_email'] ?></a></li>
                <li><i class="icofont-phone"></i> <?= Yii::$app->params['mobile_no'] ?></li>
                <li><i class="icofont-clock-time icofont-flip-horizontal"></i> <?= Yii::$app->params['timing'] ?></li>
            </ul>

        </div>
        <div class="cta">
            <?= Html::a('Get Appointment', 'https://mannsparsh.com/site/book-appointment', ['class' => 'scrollto']) ?>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="shadow-sm">
    <div class="container d-flex">

        <div class="logo mr-auto">
            <h1 class="text-light">
                <?= Html::img('@web/images/manasa-logo.png') ?>
                <a href="<?= \yii\helpers\Url::toRoute('site/index') ?>"></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <?php
            echo Nav::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about-us']],
//                    ['label' => 'Services', 'url' => ['/site/services']],
                    ['label' => 'Doctors', 'url' => ['/site/doctors']],
//                    ['label' => 'Blogs', 'url' => ['/site/blogs']],
                    ['label' => 'FAQs', 'url' => ['/site/faq']],
                    ['label' => 'Contact Us', 'url' => ['/site/contact-us']],
                ]
            ]);
            ?>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
