<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use lib\Helpers\TextHelper;

?>


<div class=" page-blog__cards">
    <?php foreach ($arResult['ITEMS'] as $arItem) {

        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_DELETE_CONFIRM')));

        ?>

        <article id="<?= $this->GetEditAreaId($arItem['ID']) ?>" class="card-post card-post--new card-post--full ">
            <div class="card-post__img">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
                     alt="<?= $arItem['PREVIEW_PICTURE']['ALT']; ?>">
            </div>
            <div class="card-post__info ">
                <div class="card-post__summary article-summary">
                    <ul class="article-summary__hashtag-list">
                        <li class="article-summary__hashtag-item">
                            <?php foreach ($arItem['PROPERTIES']['TAGS_ARTICLE']['VALUE'] as $tag) { ?>
                                <a href="#" class="article-summary__hashtag-link"><?= $tag ?></a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="card-post__link">
                    <h3 class="card-post__title"><?= $arItem['NAME']; ?></h3>
                </a>
                <div class="card-post__preview-text">
                    <p>
                        <?= !empty($arItem['PREVIEW_TEXT']) ? $arItem['PREVIEW_TEXT'] : TextHelper::textResize($arItem['DETAIL_TEXT'], $arParams['WORD_COUNT']); ?>
                    </p>
                </div>
                <div class="card-post__bottom article-summary">
                    <div class="article-summary__info-block">
                  <span class="article-summary__author">
                    <?= $arItem['PROPERTIES']['AUTHOR']['VALUE']; ?>
                  </span>
                        <time datetime="2022-01-28" class="article-summary__info-text">
                            <?= $arItem['DISPLAY_ACTIVE_FROM']; ?>
                        </time>
                    </div>
                    <div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
                        <?= $arItem['SHOW_COUNTER'] ?? 0; ?>
                        <span class="article-summary__info-icon article-summary__info-icon--eye">
                    <svg width="22" height="22">
                      <use href="#icon-eye-3"></use>
                    </svg>
                  </span>
                    </div>
                </div>
            </div>
        </article>
    <?php } ?>
</div>

<div class="news-list">
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
