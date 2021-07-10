<?php

use yii\helpers\Html;

?>
<!-- FOOTER-2
============================================= -->
<footer id="footer-2" class="wide-40 footer division">
    <div class="container">


        <!-- FOOTER CONTENT -->
        <div class="row">


            <!-- FOOTER INFO -->
            <div class="col-md-6 col-lg-4">
                <div class="footer-info mb-40">

                    <!-- Footer Logo -->
                    <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80  pixels) -->
                    <?= Html::img('@web/images/logo.png', ['width' => '250', 'alt' => 'footer-logo']) ?>

                    <!-- Email -->
                    <p class="foo-email">E: <a href="mailto:mannsparshpsy@gmail.com">mannsparshpsy@gmail.com</a></p>

                    <!-- Phone -->
                    <p>P: <?= Yii::$app->params['landline_no'] ?>, <?= Yii::$app->params['mobile_no'] ?></p>

                    <!-- Social Icons -->
                    <div class="footer-socials-links mt-20">
                        <ul class="foo-socials text-center clearfix">

                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#" class="ico-tumblr"><i class="fab fa-tumblr"></i></a></li>

                            <!--
                            <li><a href="#" class="ico-behance"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#" class="ico-dribbble"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" class="ico-pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#" class="ico-youtube"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#" class="ico-vk"><i class="fab fa-vk"></i></a></li>
                            <li><a href="#" class="ico-yelp"><i class="fab fa-yelp"></i></a></li>
                            <li><a href="#" class="ico-yahoo"><i class="fab fa-yahoo"></i></a></li>
                            -->

                        </ul>
                    </div>

                </div>
            </div>	<!-- END FOOTER INFO -->

            <div class="col-md-6 col-lg-3"></div>

            <!-- FOOTER PRODUCTS LINKS -->
            <div class="col-md-6 col-lg-2 offset-lg-1">
                <div class="footer-links mb-40">

                    <!-- Title -->
                    <h5 class="h5-xs">Discovery</h5>

                    <!-- Footer List -->
                    <ul class="clearfix">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><?= Html::a('FAQs', ['site/faq']) ?></li>
                    </ul>

                </div>
            </div>


            <!-- FOOTER COMPANY LINKS -->
            <div class="col-md-6 col-lg-2">
                <div class="footer-links mb-40">

                    <!-- Title -->
                    <h5 class="h5-xs">About Hospital</h5>

                    <!-- Footer Links -->
                    <ul class="clearfix">
                        <li><?= Html::a('About Hospital', ['site/about-us']) ?></li>
                        <li><?= Html::a('Contact us', ['site/contact-us']) ?></li>
                        <li><?= Html::a('Press & Media', ['site/blogs']) ?></li>
                        <li><?= Html::a('Our Blog', ['site/blogs']) ?></li>
                    </ul>

                </div>
            </div>


            <!-- FOOTER NEWSLETTER FORM -->
            <div class="col-md-6 col-lg-3 d-none">
                <div class="footer-form mb-20">

                    <!-- Title -->
                    <h5 class="h5-xs">Subscribe Us:</h5>

                    <!-- Text -->
                    <p class="p-sm m-bottom-20">Stay up to date with our latest news, updates and our new products</p>

                    <!-- Newsletter Form Input -->
                    <form class="newsletter-form">

                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email Address" required id="s-email">
                            <span class="input-group-btn">
                                <button type="submit" class="btn">
                                    <i class="far fa-envelope"></i>
                                </button>
						    </span>
                        </div>

                        <!-- Newsletter Form Notification -->
                        <label for="s-email" class="form-notification"></label>

                    </form>

                </div>
            </div>	<!-- END FOOTER NEWSLETTER FORM -->


        </div>	  <!-- END FOOTER CONTENT -->


        <!-- FOOTER COPYRIGHT -->
        <div class="bottom-footer">
            <div class="row">
                <div class="col-md-12">
                    <p class="footer-copyright">
                        &copy; <?= date('Y') ?> <span>Mannsparsh Neuropsychiatric Center and Nursing Home</span>. All Rights Reserved
                        • Developed by <span><?= Html::a('Bhosle Techsol Pvt Ltd.', 'http://bhosletechsol.com/') ?></span>
                    </p>
                </div>
            </div>
        </div>


    </div>
    <!-- End container -->
</footer>
<!-- END FOOTER-2 -->