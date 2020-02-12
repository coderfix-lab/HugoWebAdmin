<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\core\models\Category */

$this->title = '首页';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="row">
    <div class="col-md-12">
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            默认展示首页
                        </h3>
                    </div>
                </div>

            </div>
            <div class="m-portlet__body">
        <div id="container" tabindex="0"></div>
            </div>

    </div>
    </div>
</div>

