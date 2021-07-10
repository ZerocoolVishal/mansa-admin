<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */

$this->title = 'Update Blogs: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->blog_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blogs-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
