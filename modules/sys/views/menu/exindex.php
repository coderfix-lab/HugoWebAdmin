<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/4
 * Time: 22:04
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'System Menus';
$this->params['breadcrumbs'][] = $this->title;

use app\assets\DatabaseAsset;

DatabaseAsset::register($this);

$buttons=[
    'view' => function ($url, $model, $key) {
        return Html::a("查看", [$this->context->id.'/view', 'id'=>$model->id], ['class' => "btn btn-success ", 'title' => '查看']);
    },
    'update' => function ($url, $model, $key) {
        return Html::a("修改", [$this->context->id.'/update', 'id'=>$model->id], ['class' => "btn btn-primary ", 'title' => '修改']);
    },
    'delete' => function ($url, $model, $key) {
        return Html::a("删除", [$this->context->id.'/delete', 'id'=>$model->id], ['class' => "btn btn-danger ", 'title' => '删除'
            ,'aria-label'=>'删除','data-pjax'=>"0","data-confirm"=>"您确定要删除此项吗？","data-method"=>"post"]);
    },
];
$columns['buttons']=$buttons;
?>

<div class="m-portlet m-portlet--mobile">

    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    菜单列表
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl("sys/menu/create") ?>" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
					 <span>
					 <i class="la la-plus"></i>
					 <span>创建菜单</span>
					 </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="m-portlet__body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions'=>['class'=>'table table-striped- table-bordered table-hover table-checkable'],
            'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
            'columns' => [
                'id',
                'name',
                'pid',
                'url:url',
                'rbac_name',
                'icon_style',
                'sort',

                ['class' => 'yii\grid\ActionColumn','buttons'=>$buttons],
            ],
        ]); ?>
    </div>



</div>