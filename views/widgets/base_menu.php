<?php
/**
 * Created by PhpStorm.
 * User: calvin
 * Date: 2018/7/25
 * Time: 13:58
 */


use app\widgets\BaseMenu;

?>

<?php //var_dump($menu_arr)  ?>



<?php

//快捷判断是不是有下一级
function _cprint($menun, $str, $elsestr = "")
{
    if (count($menun) !== 0) { //不存在下一级菜单
        $re = $str;
    } else {
        $re = $elsestr;
    }
    return $re;
}

//开启菜单展示
function _copen($id, $pids)
{
    if($pids == null){
        return "";
    }
    if (in_array($id, $pids)) {
        return 'm-menu__item--open';
    }
}

//菜单激活状态
function _cavtive($name, $dislink)
{
    if ($name == $dislink) {
        return "m-menu__item--active";
    }
}

function _getSubMenu($menu1, $pids, $dislink)
{
    if (!empty($menu1['children'])) {
        $html = '<div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">';
        foreach ($menu1['children'] as $menun) {
            $html .= ' <li class="m-menu__item  ' . _cavtive($menun['url'], $dislink) . '  ' . _copen($menun['id'], $pids) . ' ' . _cprint($menun['children'], "", "m-menu__item--submenu") . ' " aria-haspopup="true"
                    ' . _cprint($menun['children'], "", 'm-menu-submenu-toggle="hover"') . '>
                        <a href="';
            if ($menun['url'] != null) {
                $html .= _cprint($menun['children'], "javascript:;", Yii::$app->urlManager->createUrl($menun['url']));
            }
            $html .= '" class="m-menu__link   ' . _cprint($menun['children'], "m-menu__toggle", "") . ' ">
                            <i class="m-menu__link-bullet ';
            $html .= $menun['icon_style'] ?: 'm-menu__link-bullet--dot';
            $html .= '">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">' . $menun['name'] . '</span>
                            ' . _cprint($menun['children'], '<i class="m-menu__ver-arrow la la-angle-right"></i>', "") . '
                        </a>
                    ';
            if (!empty($menun['children'])) {
                $html .= _getSubMenu($menun, $pids,null);
            }
            $html .= '</li>';
        }
        $html .= '</ul> </div>';
        return $html;
    }
}

?>

<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
     m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  <?php echo _cavtive(null, $dislink) ?>" aria-haspopup="true">
            <a href="<?= Yii::$app->urlManager->createUrl('/purview/default/index') ?>" class="m-menu__link ">
                <i class="m-menu__link-icon fa fa-chart-bar"></i>
                <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">数据报表</span>
											<span class="m-menu__link-badge">
<!--												<span class="m-badge m-badge--danger">2</span>-->
											</span>
										</span>
									</span>
            </a>
        </li>


        <?php
        if (!empty($menu_arr)) {
            //第一层外部循环
            foreach ($menu_arr as $menu) {
                ?>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text"><?= $menu['name'] ?></h4>
                    <i class="m-menu__section-icon <?= $menu['icon_style'] ?: 'flaticon-layers' ?>"></i>
                </li>
                <?php
                if (!empty($menu)) {
                    //第二层循环
                    foreach ($menu['children'] as $menu1) {
                        ?>

                        <li class="m-menu__item  m-menu__item--submenu <?= _copen($menu1['id'], $pids) ?>  <?php if (!count($menu1['children'])) echo _cavtive($menu1['url'], $dislink) ?>"
                            aria-haspopup="true" m-menu-submenu-toggle="hover">

                            <?php if (count($menu1['children'])){  //如果没有后面的 ?>

                            <a href="javascript:;" class="m-menu__link m-menu__toggle">

                                <?php }else{ ?>

                                <a href="<?php if ($menu1['url'] != null) {
                                    echo Yii::$app->urlManager->createUrl($menu1['url']);
                                } ?>" class="m-menu__link  ">

                                    <?php } ?>

                                    <i class="m-menu__link-icon <?= $menu1['icon_style'] ?: 'flaticon-layers' ?>"></i>
                                    <span class="m-menu__link-text"><?= $menu1['name'] ?></span>

                                    <?php if (!empty($menu1['children'])) { ?>

                                        <i class="m-menu__ver-arrow la la-angle-right"></i>

                                    <?php } ?>
                                </a>
                                <?php
                                echo _getSubMenu($menu1, $pids,$dislink);
                                ?>

                        </li>

                        <?php
                    }
                }
                ?>

                <?php
            }
        }
        ?>
    </ul>
</div>

