<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Hospital Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login mt-4 mb-4">
    <div class="container">

       <div class="card border-0 shadow p-3 my-5 w-100">
           <div class="card-body">

               <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

               <div class="row">
                   <div class="col-md-6">
                       <h1><?= Html::encode($this->title) ?></h1>
                       <p>Please fill out the following fields to login:</p>
                       <div class="row">
                           <div class="col-md-12">
                               <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-12">
                               <?= $form->field($model, 'password')->passwordInput() ?>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-12">
                               <?= $form->field($model, 'rememberMe')->checkbox([]) ?>
                           </div>
                       </div>
                       <div class="row" style="margin-top: 10px; margin-bottom: 10px">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <?= Html::submitButton('Login', ['class' => 'btn btn-brand brand-hover', 'name' => 'login-button']) ?>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6 text-center d-none d-md-block">
                       <?= Html::img('@web/images/logo.png', ['width' => '50%', 'class' => 'mt-5']) ?>
                   </div>
               </div>

               <?php ActiveForm::end(); ?>
           </div>
       </div>


    </div>
</div>
