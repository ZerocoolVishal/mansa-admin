<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */

$authModules = \app\models\AuthModule::find()
    ->leftJoin(\app\models\AuthItem::tableName(), 'tbl_auth_module.auth_module_id = tbl_auth_item.auth_module_id')
    ->where(['tbl_auth_item.rule_type' => 'A'])
    ->andWhere(['tbl_auth_item.is_active' => 1])
    ->andWhere(['tbl_auth_module.is_active' => 1])
    ->all();

if(!$model->isNewRecord) {
    $userPermissions = \app\helpers\AppHelpers::getUserAuthItems($model->admin_id, 'A');
}

$this->registerJsVar('showModules', []);

$this->registerJs("
    $(document).ready(function() {
        showModules.forEach((val) => {
            $('#' + val).addClass('show');
        })
    })
", \yii\web\View::POS_END);


?>

<style>
    .admin-form ul {
        display: flex;
        align-items: center;
    }
    .chk{
        height: 25px;
        margin: 10px;
        font-weight: 600;
        color: #6a6c6f;
        float: left;
        list-style-type: none;
    }
</style>

<div class="admin-form pt-3">

    <?php $form = ActiveForm::begin(); ?>

    <div class="text-right w-100">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <h5>User Details</h5>
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
        </div>
    </div>

    <h5>System Permissions</h5>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col col-md-12">
                    <div class="accordion" id="accordionPermissions">
                        <div class="border">
                            <?php foreach ($authModules as $authModule): ?>

                                <div class="card">
                                    <div class="card-header" id="heading<?= $authModule->auth_module_id ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $authModule->auth_module_id ?>" aria-expanded="true" aria-controls="collapse<?= $authModule->auth_module_id ?>">
                                                <?= $authModule->module_name ?>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse<?= $authModule->auth_module_id ?>" class="collapse" aria-labelledby="heading<?= $authModule->auth_module_id ?>" data-parent="#accordionPermissions">
                                        <div class="card-body">
                                            <ul style="margin: 0px;padding: 0px;">
                                                <?php foreach ($authModule->authItems as $authItem): ?>
                                                    <?php $isChecked = ($model->isNewRecord)? false : in_array($authItem->auth_item_id, $userPermissions); ?>
                                                    <?php if($isChecked): ?>
                                                    <script>
                                                        if(!(showModules.indexOf('<?= 'collapse'.$authModule->auth_module_id ?>') > -1)) {
                                                            showModules.push('<?= 'collapse'.$authModule->auth_module_id ?>')
                                                        }
                                                    </script>
                                                <?php endif; ?>
                                                    <li class="chk">
                                                        <?= $form->field($model, "permissions[$authItem->auth_item_id]")
                                                            ->checkBox([
                                                                'class' => 'i-checks',
                                                                'label' => $authItem->item_name,
                                                                'checked' => $isChecked
                                                            ]); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
