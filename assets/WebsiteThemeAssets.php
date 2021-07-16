<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class WebsiteThemeAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/theme-web/';
    public $css = [
        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i',
//        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/icofont/icofont.min.css',
        'vendor/boxicons/css/boxicons.min.css',
        'vendor/venobox/venobox.css',
        'vendor/owl.carousel/assets/owl.carousel.min.css',
        'vendor/aos/aos.css',
        'css/style.css',
    ];
    public $js = [
//        'vendor/jquery/jquery.min.js',
//        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/jquery.easing/jquery.easing.min.js',
        'vendor/php-email-form/validate.js',
        'vendor/jquery-sticky/jquery.sticky.js',
        'vendor/venobox/venobox.min.js',
        'vendor/owl.carousel/owl.carousel.min.js',
        'vendor/isotope-layout/isotope.pkgd.min.js',
        'vendor/aos/aos.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
