<?php

use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Doctors
*/

$this->title = $model->name;

?>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => 'Doctors', 'url' => 'site/doctors', 'active' => false],
        ['title' => $model->name, 'active' => true]
    ]
]) ?>

<!-- DOCTOR-2 DETAILS -->
<section id="doctor-2-details" class="wide-70 doctor-details-section division">
    <div class="container">
        <div class="row">


            <!-- DOCTOR PHOTO -->
            <div class="col-md-5 col-xl-5">
                <div class="doctor-photo mb-30 text-center">

                    <!-- Photo -->
                    <?= Html::img("@web/uploads/$model->image", ['class' => 'img-fluid', 'alt' => 'doctor-foto']) ?>

                    <!-- Text -->
                    <p class="mt-30">
                        <?= Html::encode($model->short_about) ?>
                    </p>

                    <!-- Doctor Contacts -->
                    <div class="doctor-contacts">
                        <h4 class="h4-xs"><i class="fas fa-mobile-alt"></i>0251-2358255, 9892312191</h4>
                        <h4 class="h4-xs brand-color"><i class="fas fa-envelope-open-text"></i>
                            <a href="mailto:mannsparshpsy@gmail.com" class="brand-color">mannsparshpsy@gmail.com</a>
                        </h4>
                    </div>

                    <!-- Button -->
                    <?= Html::a('Book an Appointment', ['site/book-appointment', 'doctor_id' => $model->doctor_id], ['class' => 'btn btn-md btn-brand brand-hover']) ?>

                </div>
            </div>	<!-- END DOCTOR PHOTO -->


            <!-- DOCTOR'S BIO -->
            <div class="col-md-6 col-xl-6 offset-xl-1">
                <div class="doctor-bio">

                    <!-- Name -->
                    <h2 class="h2-sm brand-color"><?= Html::encode($model->name) ?></h2>
                    <h5 class="h5-lg brand-color"><?= Html::encode($model->sibtitle) ?></h5>

                    <p>
                        <?=nl2br($model->long_about) ?>
                    </p>

                    <!-- Title -->
                    <h5 class="h5-md brand-color">Education + Trainings</h5>

                    <!-- Text -->
                    <p>
                        <?= nl2br($model->education_training) ?>
                    </p>

                    <!-- CERTIFICATES -->
                    <div class="certificates d-none">

                        <!-- Title -->
                        <h5 class="h5-md brand-color">Diplomas and Certificates</h5>

                        <!-- Certificate Preview -->
                        <div class="row">

                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <!-- Certificate Image -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="certificate-image">
                                    <a class="image-link" href="images/certificate-1.png" title="">
                                        <?= Html::img('@web/website-theme/images/certificate-1.png', ['class' => 'img-fluid', 'alt' => 'certificate-image']) ?>
                                    </a>
                                </div>
                            </div>
                            <?php endfor; ?>

                        </div>
                    </div>	<!-- END CERTIFICATES -->

                </div>
            </div>	<!-- END DOCTOR BIO -->


        </div>   <!-- End row -->
    </div>	  <!-- End container -->
</section> <!-- END  DOCTOR-2 DETAILS -->

<?= $this->render('../layouts/website/_testimonies'); ?>