<?php
/**
 * Created by PhpStorm.
 * User: zdwljs
 * Date: 2018/7/25
 * Time: 14:45
 */

use yii\helpers\Html;
use app\assets\UserinfoAsset;

UserinfoAsset::register($this);

$assets_url=$this->assetBundles[UserinfoAsset::className()]->baseUrl;

?>

<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">

            <!--用户信息登录登出-->
            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                m-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?= $assets_url.'/user/avatar/'.$info['avatar']?>"
                                                         class="m--img-rounded m--marginless" alt=""/>
												</span>
                    <span class="m-topbar__username m--hide"><?= $info['display_name'] ?></span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__header m--align-center"
                             style="background: url(<?= $assets_url?>/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                            <div class="m-card-user m-card-user--skin-dark">
                                <div class="m-card-user__pic">
                                    <img src="<?= $assets_url."/user/avatar/".$info['avatar']?>"
                                         class="m--img-rounded m--marginless" alt=""/>

                                    <!--
                                            <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
                                            -->
                                </div>
                                <div class="m-card-user__details">
                                    <span class="m-card-user__name m--font-weight-500"><?= $info['display_name'] ?></span>
                                    <a href="" class="m-card-user__email m--font-weight-300 m-link"><?= $info['email_address'] ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                                <ul class="m-nav m-nav--skin-light">
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">Section</span>
                                    </li>
                                    <li class="m-nav__item">
<!--                                        <a href="header/profile.html" class="m-nav__link">-->
<!--                                            <i class="m-nav__link-icon flaticon-profile-1"></i>-->
<!--                                            <span class="m-nav__link-title">-->
<!--																			<span class="m-nav__link-wrap">-->
<!--																				<span class="m-nav__link-text">我的资料</span>-->
<!--																				<span class="m-nav__link-badge">-->
<!--																					<span class="m-badge m-badge--success">2</span>-->
<!--																				</span>-->
<!--																			</span>-->
<!--																		</span>-->
<!--                                        </a>-->
                                    </li>
<!--                                    <li class="m-nav__item">-->
<!--                                        <a href="header/profile.html" class="m-nav__link">-->
<!--                                            <i class="m-nav__link-icon flaticon-share"></i>-->
<!--                                            <span class="m-nav__link-text">我的消息</span>-->
<!--                                        </a>-->
<!--                                    </li>-->

                                    <li class="m-nav__item">
                                        <a href="<?= Yii::$app->urlManager->createUrl('sys/public/logout') ?>"
                                           class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">登出</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

