<?php

/**
 * @var $this \yii\web\View;
 */

$this->title = 'About Us';

?>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => 'About us', 'active' => true]
    ]
]) ?>

<!-- ABOUT US -->
<?= $this->render('../layouts/website/_info') ?>

<!-- FEATURED DOCTORS -->
<?= $this->render('../layouts/website/_doctors', ['class' => 'bg-lightgrey']) ?>

<!-- EMERGENCY -->
<?= $this->render('../layouts/website/_banner2') ?>
