<?php

use yii\helpers\Html;

?>
<!-- TABS-1
============================================= -->
<section id="tabs-1" class="wide-100 tabs-section division">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <!-- TABS NAVIGATION -->
                <div id="tabs-nav" class="list-group text-center">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">

                        <!-- TAB-1 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
<!--                                <span class="flaticon-083-stethoscope"></span>-->
                                CHILD PSYCHIATRY
                            </a>
                        </li>

                        <!-- TAB-2 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
<!--                                <span class="flaticon-005-blood-donation-3"></span> -->
                                GERIATRIC PSYCHIATRY
                            </a>
                        </li>

                        <!-- TAB-3 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link" id="tab3-list" data-toggle="pill" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
<!--                                <span class="flaticon-031-scanner"></span>-->
                                DEADDICTION PSYCHIATRY
                            </a>
                        </li>

                        <!-- TAB-4 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link" id="tab4-list" data-toggle="pill" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">
<!--                                <span class="flaticon-048-lungs"></span> -->
                                ADULT PSYCHIATRY
                            </a>
                        </li>

                        <!-- TAB-5 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link" id="tab5-list" data-toggle="pill" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">
<!--                                <span class="flaticon-048-lungs"></span> -->
                                COUNSELLING PSYCHOLOGY
                            </a>
                        </li>

                        <!-- TAB-6 LINK -->
                        <li class="nav-item icon-xs">
                            <a class="nav-link" id="tab6-list" data-toggle="pill" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">
<!--                                <span class="flaticon-048-lungs"></span> -->
                                SEXOLOGY
                            </a>
                        </li>

                    </ul>

                </div>	<!-- END TABS NAVIGATION -->


                <!-- TABS CONTENT -->
                <div class="tab-content" id="pills-tabContent">


                    <!-- TAB-1 CONTENT -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-1 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-img">
                                    <?= Html::img('@web/images/child.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-1 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">CHILD PSYCHIATRY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        We believe every child is able and it is our  duty  to decode their inabilities and discover
                                        special abilities through a holistic approach of child guidance team which includes psychiatrist,
                                        psychologist, occupational therapist and special educator <br>
                                        Various issues of children:
                                    </p>

                                    <!-- Options List -->
                                    <div class="row">

                                        <div class="col-xl-6">

                                            <!-- Option #1 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">ADHD</p>
                                            </div>

                                            <!-- Option #2 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Autism spectrum disorder</p>
                                            </div>

                                            <!-- Option  #3 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Anxiety disorder</p>
                                            </div>

                                            <!-- Option #7 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Addictions in adolescents</p>
                                            </div>

                                        </div>

                                        <div class="col-xl-6">

                                            <!-- Option #4 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Learning disorder</p>
                                            </div>

                                            <!-- Option #5 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Depressive disorder</p>
                                            </div>

                                            <!-- Option #6 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Many other issues like temper tantrums, headbanging, bedwetting</p>
                                            </div>

                                        </div>

                                    </div>	<!-- End Options List -->

                                </div>
                            </div>	<!-- END TAB-1 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-1 CONTENT -->

                    <!-- TAB-2 CONTENT -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-2 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-imgs">
                                    <?= Html::img('@web/images/old.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-2 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">GERIATRIC PSYCHIATRY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        We believe that sustaining through fragile age is
                                        always possible with healthy aging via a healthy mind.
                                        We value our senior citizens to the core so as to maintain their dignity.
                                    </p>

                                    <!-- Options List -->
                                    <div class="row">

                                        <div class="col-xl-6">

                                            <!-- Option #1 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">One of the major challenges in the ageing population is memory impairment due to dementia and depression</p>
                                            </div>

                                        </div>

                                    </div>	<!-- End Options List -->

                                </div>
                            </div>	<!-- END TAB-2 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-2 CONTENT -->

                    <!-- TAB-3 CONTENT -->
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-3 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-img">
                                    <?= Html::img('@web/images/no-smoking.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-3 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">DEADDICTION PSYCHIATRY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        We believe addiction is a disease of the brain and not a fault in character.
                                        Early intervention and individualized strategic treatment plan is the key
                                        to unlock the cage of addiction. <br>
                                        Various substances of addiction include:
                                    </p>

                                    <!-- Options List -->
                                    <div class="row">

                                        <div class="col-xl-6">

                                            <!-- Option #1 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Alcohol, smoking. Charas ganja, heroin. etc</p>
                                            </div>

                                            <!-- Option #2 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Internet gaming addiction</p>
                                            </div>

                                            <!-- Option #3 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Social media addiction</p>
                                            </div>

                                        </div>

                                    </div>	<!-- End Options List -->

                                </div>
                            </div>	<!-- END TAB-3 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-3 CONTENT -->

                    <!-- TAB-4 CONTENT -->
                    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab4-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-4 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-img">
                                    <?= Html::img('@web/images/adult.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-4 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">ADULT PSYCHIATRY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        Adulthood (early or late) is vulnerable to many major psychiatric disorders
                                        like depression, anxiety, OCD, schizophrenia. Personality disorders.Bipolar
                                        mood disorders etc.
                                    </p>

                                </div>
                            </div>	<!-- END TAB-4 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-4 CONTENT -->

                    <!-- TAB-5 CONTENT -->
                    <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab5-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-4 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-img">
                                    <?= Html::img('@web/images/counseling.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-4 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">COUNSELLING PSYCHOLOGY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        Trained counselors help to deal with emotional turmoil  and negative thoughts
                                    </p>

                                </div>
                            </div>	<!-- END TAB-4 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-4 CONTENT -->

                    <!-- TAB-6 CONTENT -->
                    <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tab6-list">
                        <div class="row d-flex align-items-center">


                            <!-- TAB-4 IMAGE -->
                            <div class="col-lg-6">
                                <div class="tab-img">
                                    <?= Html::img('@web/images/couple.jpg', ['class' => 'img-fluid', 'alt' => 'tab-image']) ?>
                                </div>
                            </div>


                            <!-- TAB-4 TEXT -->
                            <div class="col-lg-6">
                                <div class="txt-block pc-30">

                                    <!-- Title -->
                                    <h3 class="h3-md dark-brand">SEXOLOGY</h3>

                                    <!-- Text -->
                                    <p class="mb-30">
                                        Sex is one of the basic drives of human beings and its an important aspect for a marital couple.
                                        It is related to both physical and psychological health <br>
                                        Various sexual dysfunctions include:
                                    </p>

                                    <!-- Options List -->
                                    <div class="row">

                                        <div class="col-xl-6">

                                            <!-- Option #1 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Erectile dysfunction</p>
                                            </div>

                                            <!-- Option #2 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Premature ejaculation</p>
                                            </div>

                                            <!-- Option #3 -->
                                            <div class="box-list">
                                                <div class="box-list-icon brand-color"><i class="fas fa-angle-double-right"></i></div>
                                                <p class="p-sm">Hypo or hyper sexual desire disorder</p>
                                            </div>

                                        </div>

                                    </div>	<!-- End Options List -->

                                </div>
                            </div>	<!-- END TAB-4 TEXT -->


                        </div>
                    </div>
                    <!-- END TAB-4 CONTENT -->


                </div>	<!-- END TABS CONTENT -->


            </div>
        </div>     <!-- End row -->
    </div>     <!-- End container -->
</section>
<!-- END TABS-1 -->