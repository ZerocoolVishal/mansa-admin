<?php

/**
 * @var $this \yii\web\View;
 * @var $model \app\models\Faq[];
 */

use yii\bootstrap4\Html;

?>

<style>
    #faqs-page #accordion [data-toggle="collapse"] .collapsed:after, #faqs-page #accordion [data-toggle="collapse"]:after {
        color: #80aa34 !important;
    }
</style>

<?= $this->render('../layouts/website/_breadcrumb', [
    'list' => [
        ['title' => 'FAQs', 'active' => true]
    ]
]) ?>
<!-- FAQs PAGE
			============================================= -->
<section id="faqs-page" class="wide-80 faqs-section division">
    <div class="container">
        <div class="row">


            <!-- QUESTIONS HOLDER -->
            <div class="col-lg-8">
                <div class="questions-holder pr-30">

                    <!-- Title -->
                    <h3 class="h3-md dark-brand">Frequently Asked Questions</h3>

                    <!-- Text -->
                    <p>Porta semper lacus cursus, feugiat primis ultrice in ligula risus auctor tempus feugiat
                        dolor lacinia cubilia curae integer congue leo metus, primis in orci integer metus mollis
                        faucibus enim. Nemo ipsam egestas volute turpis dolores ut aliquam quaerat sodales sapien
                        undo pretium purus feugiat dolor impedit magna purus pretium gravida donec ligula massa
                        gravida donec pretium
                    </p>


                    <!-- QUESTIONS ACCORDION -->
                    <div id="accordion" role="tablist">


                        <?php foreach ($model as $key => $faq): ?>
                        <div class="card">

                            <!-- Card Title -->
                            <div class="card-header" role="tab" id="heading<?= $key ?>">
                                <h5 class="h5-xs">
                                    <a class="<?= ($key == 0)? '' : 'collapsed' ?>" data-toggle="collapse" href="#collapse<?= $key ?>" role="button" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                        <?= $faq->question ?>
                                    </a>
                                </h5>
                            </div>

                            <!-- Card Content -->
                            <div id="collapse<?= $key ?>" class="collapse <?= ($key == 0)? 'show' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $key ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <!-- Text -->
                                    <p><?= $faq->answer ?></p>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>

                    </div>	<!-- END QUESTIONS ACCORDION -->


                </div>
            </div>   <!--END QUESTIONS HOLDER -->


            <!-- SIDEBAR -->
            <aside id="sidebar" class="col-lg-4">


                <!-- SIDEBAR TABLE -->
                <div class="sidebar-table abox-4-table blue-table sidebar-div mb-50">
                    <!-- Title -->
                    <h5 class="h5-sm">Working Time</h5>

                    <!-- Text -->
                    <p>Address: 2/3, B wing, ground floor, Mitali height, Near KDMC D ward and Gurudham hotel , Katemanivali Naka,Pune link road, Kalyan east

                    </p>

                    <!-- Table -->
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Mon – Sat</td>
                            <td> - </td>
                            <td class="text-right">
                                01:00 PM - 03:00 PM <br>
                                07:30 PM - 09:30 PM
                            </td>
                        </tr>
                        <tr class="last-tr">
                            <td>Sun</td>
                            <td>-</td>
                            <td class="text-right">Only emergency services available</td>
                        </tr>
                        </tbody>
                    </table>
                </div>	<!-- END SIDEBAR TABLE -->


                <!-- SIDEBAR TIMETABLE -->
                <div class="sidebar-timetable sidebar-div mb-50">

                    <!-- Title -->
                    <h5 class="h5-md mb-20 dark-brand">Book An Appointment</h5>

                    <!-- Text -->
                    <p class="p-sm">Porta semper lacus cursus, feugiat primis ultrice ligula risus auctor at
                        tempus feugiat dolor lacinia cursus nulla vitae massa
                    </p>

                    <!-- Button -->
                    <?= Html::a('View Doctors', ['site/doctors'], ['class' => 'btn btn-brand brand-hover mt-10']) ?>

                </div>	<!-- END SIDEBAR TIMETABLE -->

            </aside>   <!-- END SIDEBAR -->


        </div>     <!-- End row -->
    </div>	    <!-- End container -->
</section>	 <!-- END FAQs PAGE -->
