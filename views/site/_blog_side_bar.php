<?php

use yii\helpers\Html;

?>

<!-- SIDEBAR -->
<aside id="sidebar" class="col-lg-4">


    <!-- SEARCH FIELD -->
    <div id="search-field" class="sidebar-div mb-50">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-field">
            <div class="input-group-append">
                <button class="btn" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>


    <!-- BLOG CATEGORIES -->
    <div class="blog-categories sidebar-div mb-50">

        <!-- Title -->
        <h5 class="h5-sm steelblue-color">Categories</h5>

        <?php foreach (\app\helpers\AppHelpers::getBlogCategoriesWithCount() as $key => $category): ?>
        <ul class="blog-category-list clearfix">
            <li><a href="<?= \yii\helpers\Url::to(['site/blogs', 'category_id' => $category['id']]) ?>">
                    <i class="fas fa-angle-double-right brand-color"></i> <?= $category['name'] ?>
                </a>
                <span>(<?= $category['count'] ?>)</span>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>


    <!-- POPULAR POSTS -->
    <div class="popular-posts sidebar-div mb-50">

        <!-- Title -->
        <h5 class="h5-sm steelblue-color">Popular Posts</h5>

        <ul class="popular-posts">

            <?php foreach (\app\helpers\AppHelpers::getPopularBlog() as $key => $blog): ?>
            <li class="clearfix d-flex align-items-center">

                <!-- Image -->
                <?= Html::img($blog['image'], ['width' => '90px', 'class' => 'img-fluid', 'alt' => 'blog-post-preview']) ?>

                <!-- Text -->
                <div class="post-summary">
                    <?= Html::a($blog['title'], ['site/blog-view', 'id' => $blog['id']]) ?>
                    <p><?= date('M d, Y', strtotime($blog['date'])) ?></p>
                </div>

            </li>
            <?php endforeach; ?>

    </div>


    <!-- SIDEBAR TIMETABLE -->
    <div class="sidebar-timetable sidebar-div mb-50">

        <!-- Title -->
        <h5 class="h5-md mb-20 dark-brand">Book An Appointment</h5>

        <!-- Text -->
        <p class="p-sm">
            <?= Yii::$app->params['address'] ?>
        </p>

        <!-- Button -->
        <?= Html::a('View Doctors', ['site/doctors'], ['class' => 'btn btn-brand brand-hover mt-10']) ?>

    </div>	<!-- END SIDEBAR TIMETABLE -->


</aside>	<!-- END SIDEBAR -->
