<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\sys\models\SystemMenu */

$this->title = '修改菜单';
$this->params['breadcrumbs'][] = ['label' => 'System Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon ">
													<i class="la la-gear"></i>
												</span>
                <h3 class="m-portlet__head-text">
                    <?= $this->title ?>
                </h3>
            </div>
        </div>
    </div>

    <?= $this->render('_exform', [
        'model' => $model,
    ]) ?>

</div>
