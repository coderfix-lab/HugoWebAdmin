<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/26
 * Time: 16:22
 */

use yii\helpers\Html;


use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>HugoWebAdmin </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <!--end::Base Styles -->
    <!--begin:: Global Mandatory Vendors -->
    <link href="/resource/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->
    <!--begin:: Global Optional Vendors -->
    <link href="/resource/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="/resource/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/resource/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="/resource/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="/resource/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="/resource/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="/resource/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
    <link href="/resource/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="/resource/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="/resource/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/resource/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="/resource/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
    <link href="/resource/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="/resource/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="/resource/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="/resource/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/resource/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="/resource/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="/resource/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="/resource/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(/resource/assets/app/media/img/bg/bg-1.jpg);" >
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="">
                    </a>
                </div>
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">HugoWebAdmin</h3>
                    </div>

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'options'=>['class' => 'm-login__form m-form'],
                            'fieldConfig' => [
                                'template' => "{input}<div id=\"password-error\" class=\"form-control-feedback\">{error}</div>",
                                'labelOptions' => ['class' => 'm-login__form m-form'],
                            ],
                        ]);
                        $form->errorCssClass=null;
                        ?>
                        <div class="form-group m-form__group">
                           <?= $form->field($model, 'username', ['options' =>['tag'=>false]] )
                                ->textInput(['placeholder'=>'Username','autocomplete'=>'off','class' => 'form-control m-input','tag'=>false])
                                ->label(false) ?>

                        </div>
                        <div class="form-group m-form__group">
                            <?= $form->field($model, 'password', ['options' =>['tag'=>false]] )
                                ->passwordInput(['placeholder'=>'Password','autocomplete'=>'off','class' => 'form-control m-input m-login__form-input--last','tag'=>false])
                                ->label(false) ?>

                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <?= $form->field($model, 'rememberMe')->checkbox([
                                    'template' => '<label class="m-checkbox  m-checkbox--light">{input} 记住我<span></span></label>',
                                ]) ?>

                            </div>
                            <div class="col m--align-right m-login__form-right">

                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <?= Html::submitButton('登录', ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary', 'id' => '']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->
<!--begin:: Global Mandatory Vendors -->
<script src="/resource/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="/resource/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="/resource/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/resource/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="/resource/moment/min/moment.min.js" type="text/javascript"></script>
<script src="/resource/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="/resource/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="/resource/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="/resource/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="/resource/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="/resource/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="/resource/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="/resource/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="/resource/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="/resource/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/resource/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="/resource/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
<script src="/resource/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="/resource/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="/resource/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="/resource/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="/resource/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="/resource/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="/resource/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="/resource/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="/resource/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="/resource/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="/resource/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="/resource/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
<script src="/resource/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="/resource/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="/resource/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="/resource/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="/resource/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="/resource/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="/resource/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="/resource/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/resource/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="/resource/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="/resource/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
<script src="/resource/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="/resource/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="/resource/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="/resource/raphael/raphael.js" type="text/javascript"></script>
<script src="/resource/morris.js/morris.js" type="text/javascript"></script>
<script src="/resource/chartist/dist/chartist.js" type="text/javascript"></script>
<script src="/resource/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
<script src="/resource/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="/resource/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="/resource/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="/resource/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="/resource/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="/resource/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="/resource/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle -->
<script src="/resource/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="/resource/assets/snippets/custom/pages/user/login.js" type="text/javascript"></script>
<!--end::Page Snippets -->
</body>

<!-- end::Body -->
</html>