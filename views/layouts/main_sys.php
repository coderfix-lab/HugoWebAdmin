<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/24
 * Time: 20:02
 */

use yii\helpers\Html;

use app\widgets\Copyright;
use app\widgets\BaseMenu;
use app\widgets\Userinfo;
use app\widgets\Breadcrumbs;
use app\widgets\Title;
use app\widgets\HeadTitle;

?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- begin::Head -->
    <head>

        <meta charset="utf-8"/>
        <?php HeadTitle::begin() ?>
        <?php HeadTitle::end() ?>
        <?= Html::csrfMetaTags() ?>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

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

        

        <!--end::Base Styles -->
        <link rel="shortcut icon" href="/resource/assets/favicon.ico"/>
        <style >

            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text{
                color: #61EA61;

            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-icon, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-icon{
                color: #61EA61;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item>.m-menu__link .m-menu__link-text{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__link .m-menu__link-text{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text{
                color: #ffffff;
            }
            -aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-icon, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-icon{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__section .m-menu__section-text{
                color: #ffffff;
            }
            .m-brand__icon .m-brand__toggler .m-brand__toggler--left{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__ver-arrow, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__ver-arrow{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__heading .m-menu__ver-arrow, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item.m-menu__item--open>.m-menu__link .m-menu__ver-arrow{
                color: #ffffff;
            }
            .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item .m-menu__submenu .m-menu__item.m-menu__item--active>.m-menu__link .m-menu__link-text{
                color: #61EA61;
            }

        </style>
        <?php $this->head(); ?>
    </head>

    <!-- end::Head -->
    <?php $this->beginBody(); ?>
    <!-- begin::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">

                    <!-- BEGIN: Brand -->
                    <div class="m-stack__item m-brand  m-brand--skin-dark ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <?php Title::begin() ?>
                                <?php Title::end() ?>
<!--                                <a href="index.html" class="m-brand__logo-wrapper">-->
<!--                                    <img alt=""-->
<!--                                         src="--><?//= $assets_url ?><!--/demo/default/media/img/logo/logo_default_dark.png"-->
<!--                                         alt=""/>-->
<!--                                </a>-->
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">

                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle"
                                   class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                    <span></span>
                                </a>

                                <!-- END -->

                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                                   class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>

                                <!-- END -->


                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                                   class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>

                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>

                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                        <!-- BEGIN: Horizontal Menu -->
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                                id="m_aside_header_menu_mobile_close_btn">
                            <i class="la la-close"></i>
                        </button>
                        <!--顶部操作菜单 先去掉 -->
                        <div id="m_header_menu"
                             class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">

                        </div>

                        <!-- END: Horizontal Menu -->

                        <!-- BEGIN: Topbar 用户信息和基本操作 这个可以做成小部件 -->
                        <?php Userinfo::begin() ?>
                        <?php Userinfo::end() ?>
                        <!-- END: Topbar -->
                    </div>
                </div>
            </div>
        </header>

        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

                <!-- BEGIN: Aside Menu   左侧的菜单 做成小部件 -->

                <?php BaseMenu::begin() ?>
                <?php BaseMenu::end() ?>

                <!-- END: Aside Menu 菜单结束 -->
            </div>
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

<!--            <script src="/js/machine.js" type="text/javascript"></script>-->
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <!-- BEGIN: Subheader -->
                <?php Breadcrumbs::begin() ?>
                <?php Breadcrumbs::end() ?>

                <div class="m-content">

                    <?= $content ?>
                </div>
            </div>
        </div>
        <!-- end:: Body -->


        <!-- begin::Footer 底部也是做成小部件 -->
        <?php Copyright::begin() ?>
        <?php Copyright::end() ?>
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->

    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>