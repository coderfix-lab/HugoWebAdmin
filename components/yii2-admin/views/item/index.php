<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\RouteRule;
use mdm\admin\components\Configs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);



$buttons=[
    'view' => function ($url, $model, $key) {
        return Html::a("查看", [$this->context->id.'/view', 'id'=>$model->name], ['class' => "btn btn-success ", 'title' => '查看']);
    },
    'update' => function ($url, $model, $key) {
        return Html::a("修改", [$this->context->id.'/update', 'id'=>$model->name], ['class' => "btn btn-primary ", 'title' => '修改']);
    },
    'delete' => function ($url, $model, $key) {
        return Html::a("删除", [$this->context->id.'/delete', 'id'=>$model->name], ['class' => "btn btn-danger ", 'title' => '删除'
            ,'aria-label'=>'删除','data-pjax'=>"0","data-confirm"=>"您确定要删除此项吗？","data-method"=>"post"]);
    },
];
$columns['buttons']=$buttons;

?>
<div class="role-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('rbac-admin', 'Name'),
            ],
            [
                'attribute' => 'ruleName',
                'label' => Yii::t('rbac-admin', 'Rule Name'),
                'filter' => $rules
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('rbac-admin', 'Description'),
            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons'=>$buttons],
        ],
    ])
    ?>

</div>
