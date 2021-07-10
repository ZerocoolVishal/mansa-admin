<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */

$this->title = 'Create Blogs';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogs-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
