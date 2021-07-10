<?php

use yii\helpers\Html;

/**
 * @var $this \yii\web\View;
 * @var $blogs \app\models\Blogs[]
*/

?>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => 'Our Blogs & Latest News', 'active' => true]
    ]
]) ?>

<!-- BLOG PAGE CONTENT
============================================= -->
<div id="blog-page" class="wide-100 blog-page-section division">
    <div class="container">
        <div class="row">


            <!-- BLOG POSTS HOLDER -->
            <div class="col-lg-8">
                <div class="posts-holder pr-30">


                    <?php foreach ($blogs as $blog): ?>
                    <!-- BLOG POST #1 -->
                    <div class="blog-post">

                        <!-- BLOG POST IMAGE -->
                        <div class="blog-post-img">
                            <?= Html::img("@web/uploads/$blog->image", ['width' => '100%', 'class' => 'img-fluid', 'alt' => 'blog-post-image']) ?>
                        </div>

                        <!-- BLOG POST TITLE -->
                        <div class="blog-post-txt">

                            <!-- Post Title -->
                            <h5 class="h5-xl steelblue-color">
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
                    <!-- END BLOG POST #1 -->
                    <?php endforeach; ?>

                    <!-- BLOG PAGE PAGINATION -->
<!--                    <div class="blog-page-pagination b-top">-->
<!--                        <nav aria-label="Page navigation">-->
<!--                            <ul class="pagination justify-content-center primary-theme">-->
<!--                                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-long-arrow-alt-left"></i></a></li>-->
<!--                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">2</a> </li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                                <li class="page-item next-page"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>-->
<!--                            </ul>-->
<!--                        </nav>-->
<!--                    </div>-->


                </div>
            </div>	 <!-- END BLOG POSTS HOLDER -->

            <!-- SIDEBAR -->
            <?= $this->render('_blog_side_bar') ?>
            <!-- END SIDEBAR -->


        </div>	<!-- End row -->
    </div>	 <!-- End container -->
</div>	<!-- END BLOG PAGE CONTENT -->