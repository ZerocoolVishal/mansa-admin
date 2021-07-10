<?php

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var $list
 */

?>
<!-- BREADCRUMB
============================================= -->
<div id="breadcrumb" class="division">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class=" breadcrumb-holder">

                    <!-- Breadcrumb Nav -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>">Home</a></li>
                            <?php foreach ($list as $item): ?>
                                <li class="breadcrumb-item <?= ($item['active'])? 'active' : '' ?>" <?= ($item['active'])? 'aria-current="page"' : '' ?>>
                                    <?php if(isset($item['url'])): ?>
                                        <?= Html::a($item['title'], [$item['url']]) ?>
                                    <?php else: ?>
                                        <?= $item['title'] ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>

                    <!-- Title -->
                    <h4 class="h4-sm brand-color"><?= $item['title'] ?></h4>

                </div>
            </div>
        </div>  <!-- End row -->
    </div>	<!-- End container -->
</div>	<!-- END BREADCRUMB -->