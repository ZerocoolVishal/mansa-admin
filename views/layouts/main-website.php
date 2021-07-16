<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

\app\assets\WebsiteThemeAssets::register($this);
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Mansa - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180265196-2"></script>-->
    <!--    <script>-->
    <!--        window.dataLayer = window.dataLayer || [];-->
    <!--        function gtag(){dataLayer.push(arguments);}-->
    <!--        gtag('js', new Date());-->
    <!---->
    <!--        gtag('config', 'UA-180265196-2');-->
    <!--    </script>-->

</head>
<body>
<?php $this->beginBody() ?>

<!-- PRELOADER SPINNER
============================================= -->



<!-- PAGE CONTENT STARTS
============================================= -->
<div id="page" class="page">

    <?= $this->render('website/_header') ?>

    <?= $content ?>

    <?= $this->render('website/_footer') ?>

</div>
<!-- PAGE CONTENT ENDS
============================================= -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
