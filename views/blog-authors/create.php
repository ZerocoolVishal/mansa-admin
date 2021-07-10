<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogAuthors */

$this->title = 'Create Blog Author';
$this->params['breadcrumbs'][] = ['label' => 'Blog Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-authors-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
