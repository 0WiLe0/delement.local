<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

global $relatedNewsFilter;
global $promoFilter;

$APPLICATION->SetPageProperty('PAGE_CLASS', 'page-article page-article--new');

$relatedNewsFilter = [];

$relatedIds = $arResult['PROPERTIES']['RELATED_ARTICLES']['VALUE'];

if (!empty($relatedIds)) {
    $relatedNewsFilter = ['=ID' => $relatedIds];
}

$promoFilter = [
        'ACTIVE' => 'Y',
        'PROPERTY_RELATED_ARTICLE' => $arResult['ID'],
];

?>

<section class="section page--post page--post-new">
    <div class="section__body page-article__wrap">

        <article class="post-layout tile user-free-content">

            <div class="post-layout__wrap">
                <header class="post-layout__header article-summary">
                    <ul class="post-layout__header-item article-summary__hashtag-list">

                        <?php foreach ($arResult['PROPERTIES']['TAGS_ARTICLE']['VALUE'] as $tag ) { ?>
                            <li class="article-summary__hashtag-item">
                                <a href="#" class="article-summary__hashtag-link"><?= $tag?></a>
                            </li>
                        <?php } ?>

                    </ul>
                    <div class="article-summary__post-info">
                        <span class="article-summary__author">

                            <?= $arResult['PROPERTIES']['AUTHOR']['VALUE'];?>

                        </span>
                        <time datetime="<?= $arResult['DISPLAY_ACTIVE_FROM'];?>" class="post-layout__header-item post-layout__time article-summary__info-text">

                            <?= $arResult['DISPLAY_ACTIVE_FROM'];?>

                        </time>
                    </div>
                    <span class="post-layout__header-item post-layout__time-to-read article-summary__info-text">

                        <?= $arResult['PROPERTIES']['READ_TIME']['VALUE'];?>

                    </span>
                    <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">

                        <?= $arResult['SHOW_COUNTER'] ?? 0;?>

                        <span class="article-summary__info-icon article-summary__info-icon--eye">
                        <svg width="22" height="22">
                          <use href="#icon-eye-3"></use>
                        </svg>
                      </span>
                    </div>
                </header>

                <div class="post-layout__content">


                    <?= $arResult['DETAIL_TEXT'];?>

                    <div class="post-layout__slider blog-gallery">
                        <div class="swiper-container">
                            <div class="swiper-wrapper" data-js-gallery-container>

                                <?php foreach ($arResult['PROPERTIES']['DETAIL_GALLERY']['VALUE'] as $image) { ?>
                                <div class="swiper-slide">
                                    <img src="<?= ImageHelper::resizeById($image, 783, 366)?>" width="783" height="366" class="blog-gallery__img" data-js-zoom/>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="blog-gallery__navigation">
                                <button class="blog-gallery__btn blog-gallery__btn--prev slider-btn-rounded-blue">
                                    <svg width="13" height="16" class="i-icon">
                                        <use xlink:href="#icon-arrow--left"></use>
                                    </svg>
                                </button>
                                <button class="blog-gallery__btn blog-gallery__btn--next slider-btn-rounded-blue">
                                    <svg width="13" height="16" class="i-icon">
                                        <use xlink:href="#icon-arrow--right"></use>
                                    </svg>
                                </button>
                            </div>

                            <div class="blog-gallery__pagination"></div>

                        </div>
                    </div>


                </div>

                <footer class="post-layout__footer">
                    <div class="blog-bottom">
                        <div class="blog-bottom__aux">
                            <a class="back-list-article link-with-arrow link-with-arrow--back" href="<?= $arResult['LIST_PAGE_URL']; ?>">Вернуться к списку статей</a>
                        </div>
                    </div>
                </footer>

            </div>

        </article>

        <aside class="page-article__aside">
            <?php
            $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "read_also",
                    [
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                            "NEWS_COUNT" => !empty($arResult['PROPERTIES']['RELATED_ARTICLES']['VALUE']) ? 0 : 4,
                            "SORT_BY1" => $arParams["SORT_BY1"],
                            "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                            "SORT_BY2" => $arParams["SORT_BY2"],
                            "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                            "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                            "PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
                            "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                            "SET_TITLE" => $arParams["SET_TITLE"],
                            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                            "MESSAGE_404" => $arParams["MESSAGE_404"],
                            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                            "SHOW_404" => $arParams["SHOW_404"],
                            "FILE_404" => $arParams["FILE_404"],
                            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                            "CACHE_TIME" => $arParams["CACHE_TIME"],
                            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                            "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                            "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                            "FILTER_NAME" => !empty($relatedIds) ? 'relatedNewsFilter' : '',
                            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                            "CHECK_DATES" => $arParams["CHECK_DATES"],
                            'WORD_COUNT' => $arResult["WORD_COUNT"],
                    ],
                    $component
            );
            ?>

            <?php
            $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "promo",
                    [
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => IBLOCK_ID_PROMO,
                            "NEWS_COUNT" => '',
                            "SORT_BY1" => $arParams["SORT_BY1"],
                            "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                            "SORT_BY2" => $arParams["SORT_BY2"],
                            "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                            "FIELD_CODE" => ['ID', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL'],
                            "PROPERTY_CODE" => ['LINK_ARTICLE'],
                            "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                            "SET_TITLE" => $arParams["SET_TITLE"],
                            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                            "MESSAGE_404" => $arParams["MESSAGE_404"],
                            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                            "SHOW_404" => $arParams["SHOW_404"],
                            "FILE_404" => $arParams["FILE_404"],
                            "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                            "CACHE_TIME" => $arParams["CACHE_TIME"],
                            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                            "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                            "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                            "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                            "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                            "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                            "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                            "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                            "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                            "FILTER_NAME" => 'promoFilter',
                            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                            "CHECK_DATES" => $arParams["CHECK_DATES"],
                            'WORD_COUNT' => $arResult["WORD_COUNT"],
                    ],
                    $component
            );
            ?>


        </aside>

    </div>

</section>

