<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogCategories */

$this->title = 'Update Blog Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blog Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->blog_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-categories-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
