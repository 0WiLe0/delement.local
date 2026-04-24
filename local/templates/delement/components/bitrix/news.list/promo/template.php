<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use lib\Helpers\ImageHelper;
use Bitrix\Main\Localization\Loc;

?>


<div class="promotions promotions--sticky-position">
    <a class="promotions__link" href="" target="_blank"><?= Loc::getMessage('B_NL_PROMO_PROFITABLE_TEXT') ?></a>

    <ul class="promotions__list">

        <?php foreach ($arResult['ITEMS'] as $arItem) { ?>

            <li class="promotions__item">
                <div class="promotions__item-img">
                    <img src="<?= ImageHelper::resizeById($arItem['PREVIEW_PICTURE']['ID'], 146, 140) ?>" width="146"
                         height="140" alt="">
                </div>
                <a class="promotions__item-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
            </li>

        <?php } ?>

    </ul>

</div>

