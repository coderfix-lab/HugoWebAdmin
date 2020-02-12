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

        <div id="w0" class="grid-view"><table class="table table-striped- table-bordered table-hover table-checkable"><thead>

                <tr>
                    <th>主键</th>
                    <th>菜单展示名称</th>
                    <th>上一级菜单id</th>
                    <th>对应的地址</th>
                    <th>菜单同级地址</th>
                    <th>对应权限名称</th>
                    <th>对应的图标样式
                    </th><th>排序字段</th>
                    <th class="action-column">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
        <?php
        if(count($dataSet)){
            foreach ($dataSet as $v){
                ?>

                <tr data-key="1">
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['name'] ?></td>
                    <td><?= $v['pid'] ?></td>
                    <td><?= $v['url'] ?>

                    </td>
                    <td><?= $v['sub_url'] ?>

                    </td>
                    <td><?= $v['rbac_name'] ?></td>
                    <td><i class="m-menu__link-icon <?= $v['icon_style'] ?>"></i>

                    </td><td><?= $v['sort'] ?></td>
                    <td>
                        <?= Html::a("查看", ['/sys/menu/view', 'id'=>$v['id']], ['class' => "btn btn-success ", 'title' => '查看']); ?>
                        <?= Html::a("修改", ['/sys/menu/update', 'id'=>$v['id']], ['class' => "btn btn-primary ", 'title' => '修改']); ?>
                        <?= Html::a("删除", ['/sys/menu/delete', 'id'=>$v['id']], ['class' => "btn btn-danger ", 'title' => '删除'
                            ,'aria-label'=>'删除',"data-confirm"=>"您确定要删除此项吗？"]); ?>
                    </td>
                </tr>

        <?php

            }

        }

        ?>

                </tbody></table><div class="text-right tooltip-demo"></div></div>

    </div>



</div>
