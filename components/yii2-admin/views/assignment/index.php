<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$buttons=[
    'view' => function ($url, $model, $key) {
        return Html::a("查看", ['assignment/view', 'id'=>$model->id], ['class' => "btn btn-sm btn-success", 'title' => '查看']);
    },
];

$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}',
    'buttons'=>$buttons,
];

?>
<div class="assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,

    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
