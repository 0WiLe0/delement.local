<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Application;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блог</title>

    <script data-skip-moving="true">
        var SITE_TEMPLATE_PATH = "<?= SITE_TEMPLATE_PATH ?>";
        var SITE_LANG = "<?= LANGUAGE_ID ?>";
        var INLINE_SVG_REVISION = "<?= filemtime(Application::getDocumentRoot() . SITE_TEMPLATE_PATH . '/frontend/assets/icons.svg') ?>";
    </script>
    <?php
    $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH."/frontend/assets/css/main.css");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/frontend/assets/js/bundle.js");
    $APPLICATION->ShowHead();
    ?>
</head>
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>

<div class="flow-container flow-container--inner">

    <main class="content">
        <div class="page <?$APPLICATION->ShowProperty('PAGE_CLASS');?>">
            <div class="page__content">
                <div class="container">