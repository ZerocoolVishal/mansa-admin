<?php
/**
 * @var $this \yii\web\View
 * @var $model \yii\data\ActiveDataProvider
 * @var $doctor \app\models\Doctors
 */

use yii\helpers\Html;

$this->title = "Meet the Doctors";

$sections = [];
foreach ($model->models as $doctor) {
    $sections[$doctor->section_name][] = $doctor;
}
?>

<section id="team" class="team section-bg">
    <div class="container">

        <?php foreach ($sections as $section_name => $doctors): ?>

            <h3 class="mb-5"><?= $section_name ?></h3>

            <div class="row">
                <?php foreach ($doctors as $doctor): ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <a class="doctor-item mx-auto" href="<?= \yii\helpers\Url::to(['site/doctor-details', 'id' => $doctor->doctor_id]) ?>">
                        <div class="member">
                            <div class="member-img">
                                <?= Html::img("@web/uploads/$doctor->image", ['class' => 'img-fluid', 'alt' => '']) ?>
                            </div>
                            <div class="member-info">
                                <h4><?= Html::encode($doctor->name) ?></h4>
                                <span><?= Html::encode($doctor->sibtitle) ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

        <?php endforeach; ?>

    </div>
</section>

<?= $this->render('../layouts/website/_testimonies', ['title' => 'Meet the Doctors']) ?>
