<?php
use Bitrix\Main\Loader;

AddEventHandler('main', 'OnAfterUserLogin', 'recordHistoryAuthorisation');

function recordHistoryAuthorisation($result)
{
    global $USER;

    file_put_contents(
        $_SERVER['DOCUMENT_ROOT'] . '/upload/auth_debug.txt',
        print_r($result, true) . PHP_EOL,
        FILE_APPEND
    );

    if (!Loader::includeModule('iblock')) {
        return;
    }

    $isSuccess = $result['RESULT_MESSAGE'] === true || $result['RESULT_MESSAGE'] === 1;

    $status = $isSuccess ? 'Успешно' : 'Ошибка';
    $message = $isSuccess ? '' : strip_tags($result['RESULT_MESSAGE']['MESSAGE']);

    $data = [
        'AUTH_DATETIME' => date("Y-m-d H:i:s"),
        'STATUS' => $status,
    ];

    $strStars = '';

    if (!empty($result['PASSWORD'])) {
        for($i = 0; $i < mb_strlen($result['PASSWORD']); $i++){
            $strStars = $strStars . '*';
        }
    }

    if (!$isSuccess) {
        $data['ERROR_TEXT'] = $message;
        $data['LOGIN_INPUT'] = $result['LOGIN'];
        $data['PASSWORD_MASKED'] = !empty($result['PASSWORD']) ? $strStars : '';
    }

    if ($isSuccess) {
        $data['USER_LINK'] = $result['USER_ID'];
    }

    $fields = [
        'IBLOCK_ID' => IBLOCK_ID_AUTH,
        'NAME' => 'Авторизация [' . $status . '] ' . $result['LOGIN'] . ' ' . date('d.m.Y H:i:s'),
        'ACTIVE' => 'Y',
        'PROPERTY_VALUES' => $data,
    ];

    $element = new CIBlockElement();
    $element->Add($fields);
}

