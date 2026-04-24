<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */

$arResult['ALL_TAGS'] = [];
$uniqueTags = [
    'all' => 'все',
];

$elements = \Bitrix\Iblock\Elements\ElementArticlesTable::getList([
    'select' => [
        'TAGS_ARTICLE_' => 'TAGS_ARTICLE',
    ],
    'filter' => [
        '=ACTIVE' => 'Y',
    ],
])->fetchAll();

foreach ($elements as $element) {
    $tag = trim((string)($element['TAGS_ARTICLE_VALUE'] ?? ''));

    if ($tag === '') {
        continue;
    }

    $uniqueTags[$tag] = $tag;
}

$arResult['ALL_TAGS'] = array_values($uniqueTags);

