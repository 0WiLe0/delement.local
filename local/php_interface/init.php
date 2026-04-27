<?php
use lib\EventServices\AuthHistoryLogger;
use lib\EventServices\FormMailer;

$constPath = $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/init_include/const.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib/EventServices/AuthHistoryLogger.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib/EventServices/FormMailer.php';

if (file_exists($constPath)) {
    require_once $constPath;
}

\Bitrix\Main\Loader::includeModule('iblock');

\Bitrix\Main\Loader::registerAutoLoadClasses(null, [
    'lib\Helpers\TextHelper' => '/local/php_interface/lib/Helpers/TextHelper.php',
    'lib\Helpers\ImageHelper' => '/local/php_interface/lib/Helpers/ImageHelper.php',
]);

$sendMailPath = $_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/events/send_mail.php';

if (file_exists($sendMailPath)) {
    require_once $sendMailPath;
}


AddEventHandler('main', 'OnAfterUserLogin', [AuthHistoryLogger::class, 'handleLogin']);
