<?php
/**
 * @var $this \yii\web\View
 * @var $model \yii\data\ActiveDataProvider;
 */

use yii\helpers\Html;

$this->title = "Meet the Doctor";

?>

<section id="team" class="team section-bg">
    <div class="container">

        <div class="row">

                <?php
                    /* @var $doctor \app\models\Doctors */
                    foreach ($model->models as $doctor):
                ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="member">
                        <div class="member-img">
                            <?= Html::img("@web/uploads/$doctor->image", ['class' => 'img-fluid', 'alt' => '']) ?>
                            <div class="social">
                                <a href=""><i class="icofont-twitter"></i></a>
                                <a href=""><i class="icofont-facebook"></i></a>
                                <a href=""><i class="icofont-instagram"></i></a>
                                <a href=""><i class="icofont-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?= Html::encode($doctor->name) ?></h4>
                            <span><?= Html::encode($doctor->sibtitle) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>

<?= $this->render('../layouts/website/_testimonies', ['title' => 'Meet the Doctors']) ?>
