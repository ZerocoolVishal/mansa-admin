<?php

/**
 * @var $this \yii\web\View;
 */

$this->title = 'About Us';

?>

<!-- ABOUT US -->
<?= $this->render('../layouts/website/_info') ?>

<!-- FEATURED DOCTORS -->
<?= $this->render('../layouts/website/_doctors', ['class' => 'bg-lightgrey']) ?>
