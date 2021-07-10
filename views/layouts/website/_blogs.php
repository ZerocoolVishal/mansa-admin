<?php

use yii\helpers\Html;

?>
<!-- BLOG-1
============================================= -->
<section id="blog-1" class="bg-lightgrey wide-60 blog-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

                <!-- Title 	-->
                <h3 class="h3-md steelblue-color">Our Stories, Tips & Latest News</h3>

                <!-- Text -->
                <p>Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero at tempus,
                    blandit posuere ligula varius congue cursus porta feugiat
                </p>

            </div>
        </div>


        <!-- BLOG POSTS HOLDER -->
        <div class="row">


            <?php foreach (\app\helpers\AppHelpers::getPopularBlog() as $blog): ?>
                <div class="col-lg-4">
                    <div class="blog-post wow fadeInUp" data-wow-delay="0.4s">

                        <!-- BLOG POST IMAGE -->
                        <div class="blog-post-img">
                            <?= Html::img($blog['image'], ['class' => 'img-fluid', 'alt' => 'blog-post-image']) ?>
                        </div>

                        <!-- BLOG POST TITLE -->
                        <div class="blog-post-txt">

                            <!-- Post Title -->
                            <h5 class="h5-sm steelblue-color">
                                <?= Html::a($blog['title'], ['site/blog-view', 'id' => $blog['id']]) ?>
                            </h5>

                            <!-- Post Data -->
                            <span><?= date('M d, Y', strtotime($blog['date'])) ?> <?= ($blog['author'])? "by <span>{$blog['author']}</span>" : '' ?></span>

                            <!-- Post Text -->
                            <p>
                                <?= substr(Html::encode($blog['content']), 0, 150) ?>...
                            </p>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>	<!-- END BLOG POSTS HOLDER -->


        <!-- ALL POSTS BUTTON -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="all-posts-btn mb-40 wow fadeInUp" data-wow-delay="1s">
                    <?= Html::a('Read More Posts', ['site/blogs'], ['class' => 'btn btn-brand brand-hover']) ?>
                </div>
            </div>
        </div>


    </div>	   <!-- End container -->
</section>
<!-- END BLOG-1 -->