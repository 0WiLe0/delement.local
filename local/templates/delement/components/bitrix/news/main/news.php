<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

use \Bitrix\Main\Localization\Loc;

global $filter;

$search = trim($_GET['q'] ?? '');
$tag_search = trim($_GET['tag'] ?? '');
$filter = ['ACTIVE' => 'Y'];

if ($search !== '') {
    $filter[] = [
            'LOGIC' => 'OR',
            ['%NAME' => $search],
            ['%DETAIL_TEXT' => $search],
            ['%PROPERTY_AUTHOR' => $search],
    ];
}

if ($tag_search !== '') {
    $filter['PROPERTY_TAGS_ARTICLE'] = $tag_search;
}

if ($_GET['tag'] == 'все') {
    $filter['PROPERTY_TAGS_ARTICLE'] = '';
}

?>

    <div class="page-blog page-blog--new">
        <div class="page-blog__ctrl">
            <div class="page-blog__collapse-wrapper" data-js-expand='{"visibleItems":"10"}'>
                <div class="page-blog__ctrl-row">
                    <div class="page-blog__no-collapse-row">

                        <form class="form page-blog__form" action method="get" id="search-form" data-js-search-form>
                            <div class="form-row">
                                <input class="form-input" type="search" name="q"
                                       value="<?= htmlspecialcharsbx($_GET['q']) ?>"
                                       placeholder="<?= Loc::getMessage('B_N_MAIN_BUTTON_SEARCH_PLACEHOLDER') ?>"/>
                                <button class="btn" type="submit">
                                    <span class="visually-hidden"><?= Loc::getMessage('B_N_MAIN_BUTTON_SEARCH_TEXT') ?></span>
                                    <svg class="i-icon btn__icon">
                                        <use href="#icon-search-2"></use>
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <button class="page-blog__collapse-button" data-js-expand-btn>
                            <span class="show-more"><?= Loc::getMessage('B_N_MAIN_MORE_TAGS_TEXT') ?></span>
                            <svg class="page-blog__collapse-btn-icon show-more" width="15" height="10">
                                <use href="#icon-arrow"></use>
                            </svg>

                            <span class="show-less"><?= Loc::getMessage('B_N_MAIN_MORE_HIDE_TAGS_TEXT') ?></span>
                            <svg class="page-blog__collapse-btn-icon show-less" width="15" height="10">
                                <use href="#icon-arrow"></use>
                            </svg>
                        </button>
                    </div>

                    <div class="page-blog__collapse-container">
                        <div class="tags tags-slider">
                            <div class="tags__container swiper-container ">
                                <div class="tags__wrapper swiper-wrapper" data-js-expand-item-container>

                                    <?php
                                    $currentTag = $_GET['tag'] ?? '';

                                    foreach ($arResult["ALL_TAGS"] as $tag) { ?>
                                        <div class="tags__item swiper-slide">
                                            <label class="checkbox">
                                                <input id="<?= $tag ?>" class="checkbox__input" form="search-form"
                                                       type="radio"
                                                       value="<?= $tag ?>" name="tag" tabindex="-1"
                                                       data-input-required="checkbox"
                                                        <?php if ($tag == $currentTag) { ?>
                                                            checked
                                                        <?php } ?>
                                                >
                                                <span class="checkbox__emulator"><?= $tag ?></span>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="h3 hidden"><?= Loc::getMessage('B_N_MAIN_NOT_FOUND_TEXT') ?></div>
    </div>

<?php $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "",
        [
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                "SORT_BY1" => $arParams["SORT_BY1"],
                "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                "SORT_BY2" => $arParams["SORT_BY2"],
                "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                "MESSAGE_404" => $arParams["MESSAGE_404"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "SHOW_404" => $arParams["SHOW_404"],
                "FILE_404" => $arParams["FILE_404"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => '0',
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
                "FILTER_NAME" => 'filter',
                "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                "CHECK_DATES" => $arParams["CHECK_DATES"],
                'WORD_COUNT' => $arParams["WORD_COUNT"],
        ],
        $component
);
