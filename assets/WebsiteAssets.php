<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class WebsiteAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/website-theme/';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900',
        'https://fonts.googleapis.com/css?family=Lato:400,700,900',
        'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
        'css/flaticon.css',
        'css/menu.css',
        'css/dropdown-effects/fade-down.css',
        'css/magnific-popup.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/animate.css',
        'css/jquery.datetimepicker.min.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/modernizr.custom.js',
        'js/jquery.easing.js',
        'js/jquery.appear.js',
        'js/jquery.stellar.min.js',
        'js/menu.js',
        'js/sticky.js',
        'js/jquery.scrollto.js',
        'js/materialize.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/imagesloaded.pkgd.min.js',
        'js/isotope.pkgd.min.js',
        'js/hero-form.js',
        //'js/contact-form.js',
        'js/comment-form.js',
        //'js/appointment-form.js',
        'js/jquery.datetimepicker.full.js',
        'js/jquery.validate.min.js',
        'js/jquery.ajaxchimp.min.js',
        'js/wow.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
