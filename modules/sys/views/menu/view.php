<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

/* @var $model app\modules\sys\models\SystemMenu */

use app\modules\sys\models\SystemMenu;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="m-portlet m-portlet--full-height ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <?= $this->title ?>
                </h3>
            </div>
        </div>

    </div>
    <div class="m-portlet__body">
        <div class="m-widget13">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'pid',
                    [
                        'label' => '上一级菜单',
                        'value' => SystemMenu::getNameById($model->pid),
                    ],
                    //'is_category',
                    'url:url',
                    'rbac_name',
                    'icon_style',
                    'sort',
                ],
                'template' => '<div class="m-widget13__item"> <span class="m-widget13__desc m--align-right">{label} </span> <span class="m-widget13__text m-widget13__text-bolder"> {value}</span></div>',
            ]) ?>
            <div class="m-widget13__action m--align-right">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>