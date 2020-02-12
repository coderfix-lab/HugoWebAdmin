<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use app\modules\core\models\AgentMachine;
use app\modules\core\models\AgentInfo;

// use app\assets\TimerAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\core\models\ItemSreach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '销售运营/签到奖励';
$this->params['breadcrumbs'][] = $this->title;

use app\assets\MachineAsset;

MachineAsset::register($this);

?>
<style>
    .hidden {
        display: none
    }
</style>
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    销售运营/编辑签到奖励

                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">

                </li>
            </ul>
        </div>

    </div>

    <!--begin::Form-->
    <?php $form = ActiveForm::begin(['action' => "",
        'fieldConfig' => [

        ], 'options' => ['class' => 'm-form m-form--fit m-form--label-align-right', 'method' => 'post']]); ?>
    <div class="m-portlet__body">
        <div class="form-group m-form__group m--margin-top-10">
            <div class="alert m-alert m-alert--default" role="alert">
                <code>签到奖励编辑后下周生效</code>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续1天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="1"
                        name="type1">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket1"
                        name="ticket1">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point1" value="1" min="1"
                       id="point1">
            </div>
        </div>
        <div id="m_repeater_1" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续2天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="2"
                        name="type2">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket2"
                        name="ticket2">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point2" value="1" min="1"
                       id="point2">
            </div>
        </div>
        <div id="m_repeater_2" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续3天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="3"
                        name="type3">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket3"
                        name="ticket3">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point3" value="1" min="1"
                       id="point3">
            </div>
        </div>
        <div id="m_repeater_3" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续4天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="4"
                        name="type4">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket4"
                        name="ticket4">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point4" value="1" min="1"
                       id="point4">
            </div>
        </div>
        <div id="m_repeater_4" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续5天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="5"
                        name="type5">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket5"
                        name="ticket5">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point5" value="1" min="1"
                       id="point5">
            </div>
        </div>
        <div id="m_repeater_5" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续6天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="6"
                        name="type6">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket6"
                        name="ticket6">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point1" value="1" min="1"
                       id="point6">
            </div>
        </div>
        <div id="m_repeater_6" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">连续7天</label>
            <div class="col-4">
                <select class="form-control  m_selectpicker hidden"
                        data-live-search="true" onchange="changeType(this)"
                        id="7"
                        name="type7">
                    <option value="">请选择类型</option>
                    <option value="point">积分</option>
                    <option value="ticket">优惠券</option>
                    <option value="muti">礼包</option>
                </select>

            </div>
            <div class="col-4">
                <select class="form-control  m_selectpicker "
                        data-live-search="true"
                        id="ticket7"
                        name="ticket7">
                    <option value="">请选择优惠券</option>
                    <?php if (count($ticket)) {
                        foreach ($ticket as $i) { ?>
                            <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id'] ?></option>
                        <?php }
                    } ?>

                </select>
                <input class="form-control m-input " hidden="hidden" type="number" name="point1" value="1" min="1"
                       id="point7">
            </div>
        </div>
        <div id="m_repeater_7" hidden>
            <div class="form-group  m-form__group row">
                <div data-repeater-list="" class="col-12">
                    <div data-repeater-item class="form-group m-form__group row align-items-center">
                        <div class="col-2 "></div>

                        <div class="col-4 ">
                            <select class="form-control  m_selectpicker "
                                    data-live-search="true" onchange="changeSubType(this)"
                                    name="subtype[]">
                                <option value="">请选择类型</option>
                                <option value="point">积分</option>
                                <option value="ticket">优惠券</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="hidden  form-control  m_selectpicker "
                                    data-live-search="true"
                                    name="subticket[]">
                                <option value="">请选择优惠券</option>
                                <?php if (count($ticket)) {
                                    foreach ($ticket as $i) { ?>
                                        <option selected value="<?= $i['id'] ?>"><?= $i['name']."_".$i['id']  ?></option>
                                    <?php }
                                } ?>

                            </select>

                            <input class="form-control m-input " hidden type="number" name="subpoint[]" value="1"
                                   min="1">
                        </div>
                        <div class="col-2">
                            <div data-repeater-delete=""
                                 class="btn-sm btn btn-danger m-btn m-btn--icon m-btn--pill">
																<span>
																	<i class="la la-trash-o"></i>
																	<span>删除</span>
																</span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="m-form__group form-group row">
                <label class="col-lg-2 col-form-label"></label>
                <div class="col-lg-4">
                    <div data-repeater-create=""
                         class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
														<span>
															<i class="la la-plus"></i>
															<span>添加</span>
														</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <button type="button" class="btn btn-success" onclick="sub()">确定</button>
                    <button type="reset" class="btn btn-secondary">取消</button>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<script>

    function changeType($this) {
        var type = $($this).val();
        var ticketinput = $($this).parent().parent().parent().children().next().next().children();
        var pointinput = $($this).parent().parent().parent().children().next().next().children().next();

        var muti = $("#m_repeater_" + $($this).attr("id"));

        if (type == 'point') {
            ticketinput.attr("hidden", "hidden");
            pointinput.removeAttr("hidden");
            muti.attr("hidden", "hidden");
        }
        if (type == 'ticket') {
            ticketinput.removeAttr("hidden");
            pointinput.attr("hidden", "hidden");
            muti.attr("hidden", "hidden");
        }
        if (type == 'muti') {
            ticketinput.attr("hidden", "hidden");
            muti.removeAttr("hidden");
        }
        if (type == '') {
            ticketinput.attr("hidden", "hidden");
            muti.attr("hidden", "hidden");
        }
    }

    function changeSubType($this) {
        var type = $($this).val();
        var ticketinput = $($this).parent().parent().parent().children("div:eq(0)").next().next().children("div:eq(0)");

        var pointinput = $($this).parent().parent().parent().children("div:eq(0)").next().next().children("div:eq(0)").next();
        // alert(pointinput.html());
        if (type == 'point') {
            ticketinput.attr("hidden", "hidden");
            pointinput.removeAttr("hidden");
        }
        if (type == 'ticket') {
            pointinput.attr("hidden", "hidden");
            ticketinput.removeAttr("hidden");
        }
        if (type == '') {
            ticketinput.attr("hidden", "hidden");
        }
    }


    //提交表单
    function sub() {
        //获取表单里的数值
        var table1 = $("#m_repeater_1").children().children().children();
        //组成数组 转换json
        var datas1 = "";
        table1.each(function () {
            var e = $(this);
            //商品数据
            var subtype1 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype1 == "优惠券"){
                //找出优惠券的值
                var valval1 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype1 == "积分"){
                //找出优惠券的值
                var valval1 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas1 = datas1 + "" + subtype1 + "=" + valval1 + ","
        });
        //提交表单
        var type1 = $('#1').val();
        var ticket1 = $('#ticket1').val();
        var point1 = $('#point1').val();
        //四个参数  type1  ticket1  point1 datas1
        //第二天
        var type2 = $('#2').val();
        var ticket2 = $('#ticket2').val();
        var point2 = $('#point2').val();
        var table2 = $("#m_repeater_2").children().children().children();
        //组成数组 转换json
        var datas2 = "";
        table2.each(function () {
            var e = $(this);
            //商品数据
            var subtype2 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype2 == "优惠券"){
                //找出优惠券的值
                var valval2 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype2 == "积分"){
                //找出优惠券的值
                var valval2 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas2 = datas2 + "" + subtype2 + "=" + valval2 + ","
        });
        //第3天
        var type3 = $('#3').val();
        var ticket3 = $('#ticket3').val();
        var point3 = $('#point3').val();
        var table3 = $("#m_repeater_3").children().children().children();
        //组成数组 转换json
        var datas3 = "";
        table3.each(function () {
            var e = $(this);
            //商品数据
            var subtype3 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype3 == "优惠券"){
                //找出优惠券的值
                var valval3 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype3 == "积分"){
                //找出优惠券的值
                var valval3 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas3 = datas3 + "" + subtype3 + "=" + valval3 + ","
        });
        //第4天
        var type4 = $('#4').val();
        var ticket4 = $('#ticket4').val();
        var point4 = $('#point4').val();
        var table4 = $("#m_repeater_4").children().children().children();
        //组成数组 转换json
        var datas4 = "";
        table4.each(function () {
            var e = $(this);
            //商品数据
            var subtype4 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype4 == "优惠券"){
                //找出优惠券的值
                var valval4 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype4 == "积分"){
                //找出优惠券的值
                var valval4 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas4 = datas4 + "" + subtype4 + "=" + valval4 + ","
        });
        //第5天
        var type5 = $('#5').val();
        var ticket5 = $('#ticket5').val();
        var point5 = $('#point5').val();
        var table5 = $("#m_repeater_5").children().children().children();
        //组成数组 转换json
        var datas5 = "";
        table5.each(function () {
            var e = $(this);
            //商品数据
            var subtype5 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype5 == "优惠券"){
                //找出优惠券的值
                var valval5 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype5 == "积分"){
                //找出优惠券的值
                var valval5 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas5 = datas5 + "" + subtype5 + "=" + valval5 + ","
        });
        //第6天
        var type6 = $('#6').val();
        var ticket6 = $('#ticket6').val();
        var point6 = $('#point6').val();
        var table6 = $("#m_repeater_6").children().children().children();
        //组成数组 转换json
        var datas6 = "";
        table6.each(function () {
            var e = $(this);
            //商品数据
            var subtype6 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype6 == "优惠券"){
                //找出优惠券的值
                var valval6 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype6 == "积分"){
                //找出优惠券的值
                var valval6 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas6 = datas6 + "" + subtype6 + "=" + valval6 + ","
        });

        //第7天
        var type7 = $('#7').val();
        var ticket7 = $('#ticket7').val();
        var point7 = $('#point7').val();
        var table7 = $("#m_repeater_7").children().children().children();
        //组成数组 转换json
        var datas7 = "";
        table7.each(function () {
            var e = $(this);
            //商品数据
            var subtype7 = e.children("div:eq(1)").children("div:eq(0)").children().next().children().children().html(); //积分还是优惠券
            if(subtype7 == "优惠券"){
                //找出优惠券的值
                var valval7 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("div:eq(0)").children().next().children().children().html();
            }
            if(subtype7 == "积分"){
                //找出优惠券的值
                var valval7 = e.children("div:eq(1)").children("div:eq(0)").parent().next().children("input:eq(0)").val();
            }
            datas7 = datas7 + "" + subtype7 + "=" + valval7 + ","
        });


        $.post("<?= Yii::$app->urlManager->createUrl("system/checkin/ajax-update") ?>", {
            type1: type1,  ticket1: ticket1,  point1:point1,datas1:datas1,
            type2: type2,  ticket2: ticket2,  point2:point2,datas2:datas2,
            type3: type3,  ticket3: ticket3,  point3:point3,datas3:datas3,
            type4: type4,  ticket4: ticket4,  point4:point4,datas4:datas4,
            type5: type5,  ticket5: ticket5,  point5:point5,datas5:datas5,
            type6: type6,  ticket6: ticket6,  point6:point6,datas6:datas6,
            type7: type7,  ticket7: ticket7,  point7:point7,datas7:datas7,
        }, function (result) {
            if(result == 1){
                // alert("更新成功");
                self.location.href='<?= Yii::$app->urlManager->createUrl("system/checkin/input") ?>';
            }else{
                console.log(result)
            }
        });
    }

    //== Class definition
    var FormRepeater = function () {

        //== Private functions
        var demo1 = function () {
            $('#m_repeater_1').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_2').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_3').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_4').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_5').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_6').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
            $('#m_repeater_7').repeater({
                initEmpty: false,

                // defaultValues: {
                //     // 'count': 0
                // },

                show: function () {
                    $(this).slideDown();
                    $('.m_selectpicker').selectpicker();
                },

                hide: function (deleteElement) {
                    if (confirm('你确定要删除这个?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        }

        return {
            // public functions
            init: function () {
                demo1();
            }
        };
    }();


    jQuery(document).ready(function () {
        FormRepeater.init();
        $('.m_selectpicker').selectpicker();
    });
</script>
