
<?php
$bigTitle = $name??$this->title;
?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <?php if($bigTitle != null){ ?>
                <h3 class="m-subheader__title m-subheader__title--separator"><?= $bigTitle ?></h3>
            <?php }  ?>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="<?=  \Yii::$app->urlManager->getHostInfo(); ?>" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>首页
                    </a>
                </li>
                <?php
                if(count($list) !=0){
                    foreach ($list as $link){
                        ?>
                        <li class="m-nav__separator"> -> </li>
                        <li class="m-nav__item">
                            <?php  if($link['url'] != null){?>
                                <a href="<?=  Yii::$app->urlManager->createUrl($link['url'])  ?>" class="m-nav__link">
                                    <span class="m-nav__link-text"><?= $link['name'] ?></span>
                                </a>
                            <?php }else{ ?>
                                <span class="m-nav__link-text"><?= $link['name'] ?></span>
                            <?php } ?>
                        </li>
                <?php } }  ?>
            </ul>
        </div>
    </div>
</div>