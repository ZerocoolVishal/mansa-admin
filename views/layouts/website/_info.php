<?php

use yii\helpers\Html;

?>
<!-- INFO-2
============================================= -->
<section id="info-2" class="wide-60 info-section division section-bg">
    <div class="container">
        <div class="row d-flex align-items-center">


            <!-- TEXT BLOCK -->
            <div class="col-lg-8">
                <div class="txt-block pc-30 mb-40 wow fadeInUp" data-wow-delay="0.4s">

                    <!-- Section ID -->
                    <span class="section-id">ABOUT US</span>

                    <!-- Title -->
                    <h3 class="h3-md dark-brand"><?= Yii::$app->params['name'] ?></h3>

                    <!-- Text -->
                    <p class="mb-30">
                        <b><?= Yii::$app->params['name'] ?></b> is one of the licensed rehabilitation and DE-addiction facility situated currently at Titwala providing comprehensive and holistic neuropsychiatric care under the able guidance of psychiatrist and neurologist on 24/7 basis.
                    </p>

                    <h5>OUR MISSION</h5>

                    <!-- Options List -->
                    <div class="row">

                        <div class="col-xl-12">

                            <!-- Option #1 -->
                            <div class="box-list m-top-15">
                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                <p class="p-sm">To fight against menace of drug addiction (Manasa warriors)</p>
                            </div>

                            <!-- Option #2 -->
                            <div class="box-list">
                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                <p class="p-sm"> To rehabilitate and protect rights of mentally ill and dementia patients by improving functional quality of life.</p>
                            </div>

                            <!-- Option #3 -->
                            <div class="box-list">
                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                <p class="p-sm">To create awareness in society about psychiatry as a neuroscience through integration of art and science (Bio psychosocial model)</p>
                            </div>

                        </div>

                    </div>	<!-- End Options List -->

                    <h5>OUR VISION</h5>

                    <!-- Options List -->
                    <div class="row">

                        <div class="col-xl-12">

                            <!-- Option #1 -->
                            <div class="box-list m-top-15">
                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                <p class="p-sm">To rejuvenate the patients’ lives with their full participation  through multidisciplinary approach thus providing equal opportunities for growth and reintegration in society</p>
                            </div>

                        </div>

                    </div>	<!-- End Options List -->

                    <h5>OUR PATH</h5>

                    <!-- Options List -->
                    <div class="row">

                        <div class="col-xl-12">

                            <!-- Option #1 -->
                            <div class="box-list m-top-15">
                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                <p class="p-sm">To establish as a training institute in field of psychosocial rehabilitation</p>
                            </div>

                        </div>

                    </div>	<!-- End Options List -->

                </div>
            </div>	<!-- END TEXT BLOCK -->


            <!--TIME BLOCK-->
            <?= $this->render('_timeblock') ?>


        </div>    <!-- End row -->
    </div>	   <!-- End container -->
</section>
<!-- END INFO-2 -->
