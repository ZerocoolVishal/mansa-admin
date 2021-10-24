<?php

use yii\helpers\Html;

$items = [
    [
        'thumb' => '../web/images/hospital/create-awareness-in-society.jpeg',
        'src' => '../web/images/hospital/create-awareness-in-society.jpeg'
    ],
    [
        'thumb' => '../web/images/hospital/equal-opportunity.jpeg',
        'src' => '../web/images/hospital/equal-opportunity.jpeg'
    ],
    [
        'thumb' => '../web/images/hospital/fight-against-drug-addiction.jpeg',
        'src' => '../web/images/hospital/fight-against-drug-addiction.jpeg'
    ],
    [
        'thumb' => '../web/images/hospital/protect-rights-of-mentally-ill.jpeg',
        'src' => '../web/images/hospital/protect-rights-of-mentally-ill.jpeg'
    ],
    [
        'thumb' => '../web/images/hospital/rejuvenate-patient-lives-through-full-participation.jpeg',
        'src' => '../web/images/hospital/rejuvenate-patient-lives-through-full-participation.jpeg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0005.jpg',
        'src' => '../web/images/hospital/WA0005.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0026.jpg',
        'src' => '../web/images/hospital/WA0026.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0027.jpg',
        'src' => '../web/images/hospital/WA0027.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0029.jpg',
        'src' => '../web/images/hospital/WA0029.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0030.jpg',
        'src' => '../web/images/hospital/WA0030.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0031.jpg',
        'src' => '../web/images/hospital/WA0031.jpg'
    ],
    [
        'thumb' => '../web/images/hospital/WA0033.jpg',
        'src' => '../web/images/hospital/WA0033.jpg'
    ]
];
?>

<div class="container">
    <div class="row my-4">
        <?php foreach ($items as $item): ?>
        <div class="col-md-4 mb-3 mb-md-5">
            <?= Html::a(Html::img($item['src'], ['class' => 'gallery-image border shadow rounded']), $item['src'], ['target' => '_blank']) ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
