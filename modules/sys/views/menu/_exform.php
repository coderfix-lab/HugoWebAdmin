<?php
/**
 * Created by PhpStorm.
 * User: zdwljs
 * Date: 2018/8/13
 * Time: 16:25
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\sys\models\SystemMenu;
use yii\helpers\ArrayHelper;
?>
    <!--begin::Form-->
    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => '{label}{input}{error}',
            'inputOptions' => ['class' => 'form-control m-input'],
            'options'=>['class' => 'form-group m-form__group']
        ],'options' => ['class' => 'm-form']]); ?>
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <?= $form->field($model, 'name',['labelOptions'=>['class'=>""]])->textInput(['maxlength' => true])->error(['class' => 'm-form__help']) ?>

                <?= $form->field($model, 'pid',['labelOptions'=>['class'=>""]])->dropDownList( ArrayHelper::map(SystemMenu::getDropList(),"id","name"))->error(['class' => 'm-form__help']) ?>

                <?= $form->field($model, 'url',['labelOptions'=>['class'=>""]])->textInput(['maxlength' => true])->error(['class' => 'm-form__help']) ?>
                <?= $form->field($model, 'rbac_name',['labelOptions'=>['class'=>""]])->textInput(['maxlength' => true])->error(['class' => 'm-form__help']) ?>
                <div class="col-md-6">
                    <div class="btn-group m-btn-group" role="group" aria-label="...">
                        <a href="<?=  Yii::$app->urlManager->createUrl('/sys/menu/icon1') ?>"  target="_blank" > <button type="button" class="btn btn-primary">icon样式 flaticon </button></a>
                        <a href="<?=  Yii::$app->urlManager->createUrl('/sys/menu/icon2') ?>"  target="_blank" > <button type="button" class="btn btn-success">icon样式 FontAwesome Icons </button></a>
                        <a href="<?=  Yii::$app->urlManager->createUrl('/sys/menu/icon3') ?>"  target="_blank" > <button type="button" class="btn btn-warning">icon样式 LineAwesome Icons</button></a>
                        <a href="<?=  Yii::$app->urlManager->createUrl('/sys/menu/icon4') ?>"  target="_blank" > <button type="button" class="btn btn-info">icon样式 Socicons</button></a>
                    </div>
                </div>
                <?= $form->field($model, 'icon_style',['labelOptions'=>['class'=>""]])->textInput(['maxlength' => true])->error(['class' => 'm-form__help']) ?>
                <?= $form->field($model, 'sort',['labelOptions'=>['class'=>""]])->textInput(['maxlength' => true])->error(['class' => 'm-form__help']) ?>
            </div>

        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>


    <!--end::Form-->
