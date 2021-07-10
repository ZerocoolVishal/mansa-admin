<?php

use yii\helpers\Html;

/**
 * @var $this \yii\web\View
 * @var $model \app\models\Blogs
 */


?>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => 'Our Blog', 'url' => 'site/blogs', 'active' => false],
        ['title' => $model->title, 'active' => true]
    ]
]) ?>

<!-- BLOG PAGE CONTENT
============================================= -->
<div id="single-blog-page" class="wide-100 blog-page-section division">
    <div class="container">
        <div class="row">


            <!-- SINGLE POST -->
            <div class="col-lg-8">
                <div class="single-blog-post pr-30">


                    <!-- BLOG POST IMAGE -->
                    <div class="blog-post-img mb-40">
                        <?= Html::img("@web/uploads/$model->image", ['class' => 'img-fluid', 'alt' => 'blog-post-image']) ?>
                    </div>


                    <!-- BLOG POST TEXT -->
                    <div class="sblog-post-txt">

                        <!-- Post Title -->
                        <h4 class="h4-lg steelblue-color"><?= $model->title ?></h4>

                        <!-- Post Data -->
                        <span><?= date('M d, Y', strtotime($model->created_at)) ?> <span><?= (!empty($model->author_id))? "By " . $model->author->name : '' ?></span></span>

                       <div class="mt-2">
                           <p>
                               <?= nl2br($model->content) ?>
                           </p>
                       </div>

                    </div>	<!-- END BLOG POST TEXT -->


                    <?php if($model->author_id): ?>
                    <!-- ABOUT POST AUTHOR -->
                    <div class="author-senoff">

                        <!-- Avatar -->
                        <?= Html::img("@web/uploads/{$model->author->image}", ['class' => 'img-fluid', 'alt' => 'author-avatar']) ?>


                        <!-- Text -->
                        <div class="author-senoff-txt">

                            <!-- Title -->
                            <h5 class="h5-sm steelblue-color">Published by <?= $model->author->name ?></h5>
                            <p><?= $model->author->about ?></p>

                        </div>

                    </div>	<!-- END ABOUT POST AUTHOR -->
                    <?php endif; ?>


                    <!-- RELATED POSTS -->
                    <div class="related-posts">

                        <!-- Title -->
                        <h5 class="h5-md steelblue-color">Related Posts</h5>


                        <div class="row">

                            <?php foreach (\app\helpers\AppHelpers::getResentBlog($model->blog_category_id, $model->blog_id) as $blog): ?>
                            <!-- BLOG POST #1 -->
                            <div class="col-md-6">
                                <div class="blog-post">

                                    <!-- BLOG POST IMAGE -->
                                    <div class="blog-post-img">
                                        <?= Html::img("@web/uploads/$blog->image", ['width' => '100%', 'class' => 'img-fluid', 'alt' => 'blog-post-image']) ?>
                                    </div>

                                    <!-- BLOG POST TEXT -->
                                    <div class="blog-post-txt">

                                        <!-- Post Title -->
                                        <h5 class="h5-sm steelblue-color">
                                            <?= Html::a($blog->title, ['site/blog-view', 'id' => $blog->blog_id]) ?>
                                        </h5>

                                        <!-- Post Data -->
                                        <span><?= date('M d, Y', strtotime($blog->created_at)) ?> <span><?= (!empty($blog->author_id))? "By " . $blog->author->name : '' ?></span></span>

                                        <!-- Post Text -->
                                        <p>
                                            <?= substr(Html::encode($blog->content), 0, 200) ?>...
                                        </p>

                                    </div>

                                </div>
                            </div>	<!-- END  BLOG POST #1 -->
                            <?php endforeach; ?>

                        </div>	<!-- End row -->

                    </div>	<!-- END RELATED POSTS -->

                </div>
            </div>	 <!-- END SINGLE POST -->


            <!-- SIDEBAR -->
            <?= $this->render('_blog_side_bar') ?>
            <!-- END SIDEBAR -->


        </div>	<!-- End row -->
    </div>	 <!-- End container -->
</div>	<!-- END BLOG PAGE CONTENT -->