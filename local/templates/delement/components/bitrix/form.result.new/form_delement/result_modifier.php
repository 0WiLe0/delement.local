<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock')) {
    return;
}

$arResult['SERVICES_FORM'] = [];

$elements = \Bitrix\Iblock\Elements\ElementServicesTable::getList([
    'select' => [
        'ID' => 'ID',
        'NAME' => 'NAME',
        'CODE' => 'CODE',
    ],
    'filter' => [
        '=ACTIVE' => 'Y',
    ],
    'order' => [
        'SORT' => 'ASC',
        'NAME' => 'ASC',
    ],
])->fetchAll();

$arResult['SERVICES_FORM'] = $elements;