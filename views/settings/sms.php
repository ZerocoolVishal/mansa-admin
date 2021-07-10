<?php
/* @var $this yii\web\View */

$this->title = 'SMS Module';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sms-index">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">
               <div class="col-md-4">
                   <div class="p-3 border rounded">
                       <div class="row">
                           <div class="col-6 text-left">SMS Balance</div>
                           <div class="col-6 text-right font-weight-bold"><?= (\app\helpers\SmsHelper::getBalance() + 1000) / 0.20 ?></div>
                       </div>
                   </div>
               </div>
            </div>

            <pre>
                <?php // print_r(\app\helpers\SmsHelper::sendSms('7558428911', 'Hello')); ?>
            </pre>

        </div>
    </div>
</div>