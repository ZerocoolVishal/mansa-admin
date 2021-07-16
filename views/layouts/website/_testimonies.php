<?php

use yii\helpers\Html;

$testimonies = \app\helpers\AppHelpers::getTestimonies();

?>

<!-- TESTIMONIALS-2
============================================= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

        <div class="owl-carousel testimonials-carousel">

            <?php foreach ($testimonies as $testimony): ?>
                <div class="testimonial-item">
                    <?= Html::img('@web/uploads/' . $testimony->image, ['class' => 'testimonial-img', 'alt' => 'quote-img']) ?>
                    <h3><?= Html::encode($testimony->name) ?></h3>
                    <h4><?= Html::encode($testimony->subtitle) ?></h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        <?= nl2br($testimony->content) ?>
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>
<!-- END TESTIMONIALS-2 -->
