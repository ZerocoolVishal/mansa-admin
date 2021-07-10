<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <style>
        * {
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            font-size: 100%;
            line-height: 1.6em;
            margin: 0;
            padding: 0;
        }

        body {
            -webkit-font-smoothing: antialiased;
            height: 100%;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }

        a {
            color: #348eda;
        }

        .btn-primary {
            Margin-bottom: 10px;
            width: auto !important;
        }

        .btn-primary td {
            background-color: #62cb31;
            border-radius: 3px;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-size: 14px;
            text-align: center;
            vertical-align: top;
        }

        .btn-primary td a {
            background-color: #62cb31;
            border: solid 1px #62cb31;
            border-radius: 3px;
            border-width: 4px 20px;
            display: inline-block;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            line-height: 2;
            text-decoration: none;
        }

        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .padding {
            padding: 10px 0;
        }

        table.body-wrap {
            padding: 20px;
            width: 100%;
        }

        table.body-wrap .container {
            border: 1px solid #e4e5e7;
        }

        table.footer-wrap {
            clear: both !important;
            width: 100%;
        }

        .footer-wrap .container p {
            color: #666666;
            font-size: 12px;

        }

        table.footer-wrap a {
            color: #999999;
        }

        h1,
        h2,
        h3 {
            color: #111111;
            font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            font-weight: 200;
            line-height: 1.2em;
            margin: 40px 0 10px;
        }

        h1 {
            font-size: 36px;
        }
        h2 {
            font-size: 28px;
        }
        h3 {
            font-size: 22px;
        }

        p,
        ul,
        ol {
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 10px;
        }

        ul li,
        ol li {
            margin-left: 5px;
            list-style-position: inside;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .logo {
            width: 250px !important;
        }

        .theme {
            background-color: #f6f6f6;
            text-align: center;
            margin-top: 60px !important;
            padding: 40px;
        }

        .footer {
            margin-top: 30px;
            color: #000000;
        }

        /* ---------------------------------------------------
            RESPONSIVENESS
        ------------------------------------------------------ */

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            clear: both !important;
            display: block !important;
            Margin: 0 auto !important;
            max-width: 500px !important;
        }

        /* Set the padding on the td rather than the div for Outlook compatibility */
        .body-wrap .container {
            padding: 40px 40px 20px 40px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.08);
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            display: block;
            margin: 0 auto;
            max-width: 600px;
        }

        /* Let's make sure tables in the content area are 100% wide */
        .content table {
            width: 100%;
        }
        .img2 {
            float: left;
        }
        .img3 {
            float: right;
        }
        div.main {
            text-align: justify;
        }

    </style>
</head>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<table class="body-wrap" bgcolor="#f9f9f9">
    <tr>
        <td></td>
        <td class="container" bgcolor="#fff">
            <?= Html::img(\yii\helpers\Url::to('@web/images/logo.png', true), ['class' => 'logo center']) ?>
            <div class="content theme" bgcolor="#f9f9f9">
                <table>
                    <tr>
                        <td>
                            <?= $content ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer">
                <p>© <?= date('Y') ?> <b>Mannsparsh Neuropsychiatric Center and Nursing Home</b>. All Rights Reserved</p>
            </div>
        </td>
        <td></td>
    </tr>
</table>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
