<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;

/** @var array $arCurrentValues */

$arTemplateParameters = array(
    "WORD_COUNT" => array(
        "NAME" => Loc::getMessage("B_N_MAIN_NL_WORD_COUNT_PARAMETER"),
        "DEFAULT" => "15",
        "TYPE" => "INTEGER",
        "MULTIPLE" => "N",
        "REFRESH"=> "Y",
    )
);
