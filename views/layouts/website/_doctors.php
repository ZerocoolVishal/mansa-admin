<?php

use yii\helpers\Html;

$doctors = \app\helpers\AppHelpers::getFeaturedDoctors();

?>

<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title">
            <h2 data-aos="fade-up">Doctors</h2>
            <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">


            <?php foreach ($doctors as $doctor): ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <a href="<?= \yii\helpers\Url::to(['site/doctor-details', 'id' => $doctor->doctor_id]) ?>">
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

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div class="all-doctors mb-40">
                    <?= Html::a('Meet All Doctors', ['site/doctors'], ['class' => 'btn btn-brand brand-hover']) ?>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End Team Section -->
