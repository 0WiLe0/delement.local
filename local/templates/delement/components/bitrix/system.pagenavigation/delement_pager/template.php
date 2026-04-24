<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if ($arResult['NavPageCount'] <= 1) {
    return;
}

$current = (int)$arResult['NavPageNomer'];
$total = (int)$arResult['NavPageCount'];
$query = $arResult["NavQueryString"] ? $arResult["NavQueryString"] . "&" : "";

function pageUrl($page, $arResult, $query) {
    if ($page == 1) {
        return $arResult["sUrlPath"] . ($arResult["NavQueryString"] ? "?" . $arResult["NavQueryString"] : "");
    }
    return $arResult["sUrlPath"] . "?" . $query . "PAGEN_" . $arResult["NavNum"] . "=" . $page;
}

?>

<ul class="pagination pagination--with-navigation" data-js-content-preloader-pagination>

    <li class="pagination__item">
        <?php if ($current > 1) { ?>
            <a href="<?= pageUrl($current - 1, $arResult, $query) ?>" class="pagination__link pagination__link--prev">
                <svg class="i-icon">
                    <use xlink:href="#icon-arrow--left"></use>
                </svg>
            </a>
        <?php } else { ?>
            <span class="pagination__link pagination__link--disabled">
                <svg class="i-icon">
                    <use xlink:href="#icon-arrow--left"></use>
                </svg>
            </span>
        <?php }?>
    </li>

    <?php for ($i = 1; $i <= $total; $i++) { ?>
        <li class="pagination__item">
            <?php if ($i == $current) {?>
                <span class="pagination__link pagination__link--current"><?= $i ?></span>
            <?php } else { ?>
                <a href="<?= pageUrl($i, $arResult, $query) ?>" class="pagination__link"><?= $i?></a>
            <?php } ?>
        </li>
    <?php } ?>


    <li class="pagination__item">
        <?php if ($current < $total) { ?>
            <a href="<?= pageUrl($current + 1, $arResult, $query) ?>" class="pagination__link pagination__link--next">
                <svg class="i-icon">
                    <use xlink:href="#icon-arrow--right"></use>
                </svg>
            </a>
        <?php } else { ?>
            <span class="pagination__link pagination__link--disabled">
                <svg class="i-icon">
                    <use xlink:href="#icon-arrow--right"></use>
                </svg>
            </span>
        <?php }?>
    </li>

</ul>
