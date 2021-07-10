<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctors-form">

    <div class="card shadow">
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'sibtitle')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'short_about')->textarea(['rows' => 4]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'long_about')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'education_training')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'is_featured')->checkbox() ?>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-12">
                    <label>Image</label> <br>

                    <?php echo \dosamigos\fileupload\FileUpload::widget([
                        'name' => 'Doctors[image]',
                        'url' => [
                            'upload/common?attribute=Doctors[image]'
                        ],
                        'options' => [
                            'accept' => 'image/*',
                        ],
                        'clientOptions' => [
                            'dataType' => 'json',
                            'maxFileSize' => 2000000,
                        ],
                        'clientEvents' => [
                            'fileuploadprogressall' => "function (e, data) {
                                        var progress = parseInt(data.loaded / data.total * 100, 10);
                                        $('#progress').show();
                                        $('#progress .progress-bar').css(
                                            'width',
                                            progress + '%'
                                        );
                                     }",
                            'fileuploaddone' => 'function (e, data) {
                                        if(data.result.files.error==""){
                                            
                                            var img = \'<br/><img id="blogImg" class="img-responsive" src="' . yii\helpers\BaseUrl::home() . 'uploads/\'+data.result.files.name+\'" alt="img" style="width:256px;"/>\';
                                            $("#image_preview").html(img);
                                            $(".field-doctors-image input[type=hidden]").val(data.result.files.name);
                                            $("#progress .progress-bar").attr("style","width: 0%;");
                                            $("#progress").hide();
                                            $("#progress .progress-bar").attr("style","width: 0%;");
                                        }
                                        else{
                                           $("#progress .progress-bar").attr("style","width: 0%;");
                                           $("#progress").hide();
                                           var errorHtm = \'<span style="color:#dd4b39">\'+data.result.files.error+\'</span>\';
                                           $("#image_preview").html(errorHtm);
                                           setTimeout(function(){
                                               $("#image_preview span").remove();
                                           },3000)
                                        }
                                    }',
                        ],
                    ]) ?>

                    <div id="progress" class="progress m-t-xs full progress-small" style="display: none;">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>

                    <div id="image_preview">
                        <?php
                        if (!$model->isNewRecord) {
                            if ($model->image != "") {
                                ?>
                                <br/><img
                                        src="<?php echo yii\helpers\BaseUrl::home() ?>uploads/<?php echo $model->image ?>"
                                        alt="img" style="max-width:256px;"/>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <?php echo $form->field($model, 'image')->hiddenInput()->label(false); ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
