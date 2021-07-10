<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

\app\assets\WebsiteAssets::register($this);
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
    <title>Mannsparsh Neuropsychiatric Center and Nursing Home - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180265196-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180265196-2');
    </script>

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
