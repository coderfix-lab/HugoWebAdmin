<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/1
 * Time: 23:52
 */


/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */


$this->title = $name;

$this->context->layout = false;

use yii\helpers\Html;
use app\assets\AdminAsset;

AdminAsset::register($this);
$assets_url=$this->assetBundles[AdminAsset::className()]->baseUrl;
?>
<?php $this->beginPage() ?>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title><?=  $this->title ?></title>

    <?php $this->head() ?>
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="<?= $assets_url?>/demo/default/media/img/logo/favicon.ico"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<?php $this->beginBody() ?>
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url(<?= $assets_url?>/app/media/img//error/bg1.jpg);">
        <div class="m-error_container">
					<span class="m-error_number">
						<h1><?= $message; ?></h1>
					</span>
            <p class="m-error_desc">
                <?= nl2br(Html::encode($name)) ?>
            </p>
        </div>
    </div>
</div>

<!-- end:: Page -->

<?php $this->endBody() ?>
</body>

<!-- end::Body -->
</html>
<?php $this->endPage() ?>