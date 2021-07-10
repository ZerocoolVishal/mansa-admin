<?php

use yii\helpers\Html;

$testimonies = \app\helpers\AppHelpers::getTestimonies();

?>

<!-- TESTIMONIALS-2
============================================= -->
<section id="reviews-2" class="bg-lightgrey wide-100 reviews-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

                <!-- Title 	-->
                <h3 class="h3-md dark-brand">What Our Patients Say</h3>

                <!-- Text -->
                <p>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero at tempus,
                    blandit posuere ligula varius congue cursus porta feugiat
                </p>

            </div>
        </div>	 <!-- END SECTION TITLE -->


        <!-- TESTIMONIALS CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme reviews-holder">

                    <?php foreach ($testimonies as $testimony): ?>
                    <!-- TESTIMONIAL #1 -->
                    <div class="review-2">
                        <div class="review-txt text-center">

                            <!-- Quote -->
                            <div class="quote">
                                <?= Html::img('@web/website-theme/images/quote.png', ['alt' => 'quote-img']) ?>
                            </div>

                            <!-- Author Avatar -->
                            <div class="testimonial-avatar">
                                <?= Html::img("@web/uploads/$testimony->image", ['alt' => 'testimonial-avatar']) ?>
                            </div>

                            <!-- Testimonial Text -->
                            <p>
                                <?= nl2br($testimony->content) ?>
                            </p>

                            <!-- Testimonial Author -->
                            <div class="review-author">
                                <h5 class="h5-sm"> <?= Html::encode($testimony->name) ?></h5>
                                <span> <?= Html::encode($testimony->subtitle) ?></span>
                            </div>

                        </div>
                    </div>
                    <!--END  TESTIMONIAL #1 -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>	<!-- END TESTIMONIALS CONTENT -->


    </div>	   <!-- End container -->
</section>	 <!-- END TESTIMONIALS-2 -->