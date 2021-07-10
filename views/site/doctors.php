<?php
/**
 * @var $this \yii\web\View
 * @var $model \yii\data\ActiveDataProvider;
 */

use yii\helpers\Html;

$this->title = "Meet the Doctor";

?>

<?= $this->render('../layouts/website/_breadcrumb', [
        'list' => [
                ['title' => 'Meet the Doctors', 'active' => true]
        ]
]) ?>

<!-- DOCTORS-3
============================================= -->
<section id="doctors-3" class="wide-60 doctors-section division">
    <div class="container">
        <div class="row">


            <?php
            /* @var $doctor \app\models\Doctors */
            foreach ($model->models as $doctor):
            ?>
            <!-- DOCTOR #1 -->
            <div class="col-md-6 col-lg-4">
                <div class="doctor-2">

                    <!-- Doctor Photo -->
                    <div class="hover-overlay">
                        <?= Html::img("@web/uploads/$doctor->image", ['class' => 'img-fluid', 'alt' => 'doctor-foto']) ?>
                    </div>

                    <!-- Doctor Meta -->
                    <div class="doctor-meta">

                        <h5 class="h5-xs brand-color"><?= Html::encode($doctor->name) ?></h5>
                        <span><?= Html::encode($doctor->sibtitle) ?></span>

                        <!-- Button -->
                        <?= Html::a('View More Info', ['site/doctor-details', 'id' => $doctor->doctor_id], ['class' => 'btn btn-sm btn-brand brand-hover mt-15', 'title' => '']) ?>

                    </div>

                </div>
            </div>	<!-- END DOCTOR #1 -->
            <?php endforeach; ?>

        </div>	    <!-- End row -->
    </div>	   <!-- End container -->
</section>	<!-- END DOCTORS-3 -->

<?= $this->render('../layouts/website/_testimonies', ['title' => 'Meet the Doctors']) ?>
