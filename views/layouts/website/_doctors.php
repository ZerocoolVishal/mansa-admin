<?php

use yii\helpers\Html;

$doctors = \app\helpers\AppHelpers::getFeaturedDoctors();

?>
<!-- DOCTORS-1
============================================= -->
<section id="doctors-1" class="wide-40 doctors-section division <?= (isset($class))? $class : '' ?>">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

                <!-- Title 	-->
                <h3 class="h3-md dark-brand">Our Medical Specialists</h3>

                <!-- Text -->
                <p>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero at tempus,
                    blandit posuere ligula varius congue cursus porta feugiat
                </p>

            </div>
        </div>	 <!-- END SECTION TITLE -->


        <div class="row justify-content-md-center">


            <?php foreach ($doctors as $doctor): ?>
            <!-- DOCTOR -->
            <div class="col-md-6 col-lg-3">
                <div class="doctor-1">

                    <!-- Doctor Photo -->
                    <div class="hover-overlay text-center">

                        <!-- Photo -->
                        <?= Html::img("@web/uploads/$doctor->image", ['class' => 'img-fluid', 'alt' => 'doctor-foto']) ?>
                        <div class="item-overlay"></div>

                        <!-- Profile Link -->
                        <div class="profile-link">
                            <?= Html::a('View More Info', ['site/doctor-details', 'id' => $doctor->doctor_id], ['class' => 'btn btn-sm btn-tra-white black-hover', 'title' => '']) ?>
                        </div>

                    </div>

                    <!-- Doctor Meta -->
                    <div class="doctor-meta">

                        <h5 class="h5-sm dark-brand"><?= Html::encode($doctor->name) ?></h5>
                        <span class="brand-color"><?= Html::encode($doctor->sibtitle) ?></span>

                        <p class="p-sm grey-color">
                            <?= Html::encode($doctor->short_about) ?>
                        </p>

                    </div>

                </div>
            </div>
            <!-- END DOCTOR -->
            <?php endforeach; ?>

        </div>
        <!-- End row -->


        <!-- ALL DOCTORS BUTTON -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="all-doctors mb-40">
                    <?= Html::a('Meet All Doctors', ['site/doctors'], ['class' => 'btn btn-brand brand-hover']) ?>
                </div>
            </div>
        </div>


    </div>	   <!-- End container -->
</section>	<!-- END DOCTORS-1 -->