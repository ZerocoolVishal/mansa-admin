<?php

/**
 * @var $this \yii\web\View;
 * @var $model \app\models\Pages;
 */

$this->title = $model->title;

?>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => $model->title, 'active' => true]
    ]
]) ?>

<?= $model->content ?>
