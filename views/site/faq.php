<?php

/**
 * @var $this \yii\web\View;
 * @var $model \app\models\Faq[];
 */

use yii\bootstrap4\Html;

?>

<!-- FAQs PAGE
============================================= -->
<section id="faq" class="faq section-bg">
    <div class="container">

        <div class="section-title">
            <h2 data-aos="fade-up">F.A.Q</h2>
            <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
            <ul>

                <?php foreach ($model as $key => $faq): ?>
                <li data-aos="fade-up">
                    <i class="bx bx-help-circle icon-help"></i>
                    <a data-toggle="collapse" class="collapse" href="#faq-list-1">
                        <?= $faq->question ?>
                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                    </a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p><?= $faq->answer ?></p>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>

    </div>
</section>
<!-- END FAQs PAGE -->
