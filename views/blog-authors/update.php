<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAuthors */

$this->title = 'Update Blog Authors: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blog Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->author_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-authors-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
