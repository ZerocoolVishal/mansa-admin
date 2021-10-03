<?php

use yii\helpers\Url;
use yii\helpers\Html;

$ourMissionList = [
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0004.jpg',
        'text' => 'To rejuvenate the patients’ lives with their full participation through multidisciplinary approach.',
        'url' => ''
    ],
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0026.jpg',
        'text' => 'Providing equal opportunities to physically and mentally challenged for growth and reintegration in society.',
        'url' => ''
    ],
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0027.jpg',
        'text' => 'To fight against menace of drug addiction (Manasa warriors).',
        'url' => ''
    ],
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0029.jpg',
        'text' => 'To rehabilitate and protect rights of mentally ill and dementia patients by improving functional quality of life.',
        'url' => ''
    ],
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0030.jpg',
        'text' => 'To create awareness in society about psychiatry as a neuroscience through integration of art and science (Bio psychosocial model).',
        'url' => ''
    ],
    [
        'title' => '',
        'image' => '@web/images/hospital/WA0033.jpg',
        'text' => 'To establish as a training institute in field of psychosocial rehabilitation.',
        'url' => ''
    ],
];

?>
<!-- VALUES-3
============================================= -->
<section id="values" class="values">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Our Mission</h2>
        </div>

        <div class="row">
            <?php foreach ($ourMissionList as $value): ?>
                <div class="col-md-6 d-flex align-items-stretch mb-5" data-aos="fade-up">
                    <div class="card" style="background-image: url('<?= Url::to($value['image']) ?>');">
                        <div class="card-body">
                            <?php if (!empty($value['title'])): ?>
                                <h5 class="card-title"><?= Html::a($value['title'], $value['url']) ?></h5>
                            <?php endif; ?>
                            <p class="card-text"><?= $value['text'] ?></p>
                            <?php if ((is_array($value['url']) && count($value['url']) != 0) || $value['url'] != ''): ?>
                                <div class="read-more">
                                    <?= Html::a('<i class="icofont-arrow-right"></i> Read More', $value['url']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!-- VALUES-3 -->
