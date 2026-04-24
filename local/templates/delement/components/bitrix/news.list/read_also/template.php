<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

    <div class="topics">
        Читайте также
        <div class="topics__content">

            <div class="topics__tab">

                <ul class="topics__tab-list">

                    <?php foreach ($arResult['ITEMS'] as $item) {?>
                        <li class="topics__tab-item">


                            <div class="topics__tab-item-top">

                                <?php if(!empty($item['PROPERTIES']['TAGS_ARTICLE']['VALUE'])) {?>
                                    <a class="link" href="" target="_blank"><?= $item['PROPERTIES']['TAGS_ARTICLE']['VALUE'][0] ?></a>
                                <?php }?>

                                <time><?= $item['ACTIVE_FROM'] ?></time>
                            </div>

                            <a class="topics__tab-item-title only-2-lines" href="<?= $item['DETAIL_PAGE_URL'] ?>" target="_blank">
                                <?= mb_strlen($item['NAME']) > 30 ?
                                        $item['NAME'] :
                                        $item['NAME'] .  ' - ' . $item['DISPLAY_PROPERTIES']['AUTHOR']['VALUE'] . ', ' . $item['ACTIVE_FROM']
                                ?>
                            </a>
                        </li>
                    <?php } ?>

                </ul>

                <a class="link-with-arrow" href="<?= $arResult['LIST_PAGE_URL']; ?>" target="_blank">Все статьи</a>
            </div>

        </div>
    </div>

