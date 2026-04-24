<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;

AddEventHandler('form', 'onAfterResultAdd', 'sendMailForManagers');

function sendMailForManagers($WEB_FORM_ID, $RESULT_ID)
{
    if ((int)$WEB_FORM_ID !== (int)WEB_FORM_ID){
        return;
    }

    if (!Loader::includeModule('iblock') || !Loader::includeModule('form')) {
        return;
    }

    $managerEmail = [];
    $serviceNames = [];
    $fileIds = [];
    $serviceIds = $_POST['services'] ?? [];

    if (!is_array($serviceIds)) {
        $serviceIds = [];
    }

    $serviceIds = array_filter(array_map('intval', $serviceIds));

    if (!empty($serviceIds)) {
        $services = \Bitrix\Iblock\Elements\ElementServicesTable::getList([
            'select' => [
                'ID' => 'ID',
                'NAME' => 'NAME',
                'CODE' => 'CODE',
                'PROPERTY_MANAGER_EMAIL_' => 'MANAGER_EMAIL',
                'PROPERTY_MANAGER_NAME_' => 'MANAGER_NAME',
                'PROPERTY_MANAGER_POSITION_' => 'MANAGER_POSITION',

            ],
            'filter' => [
                'ID' => $serviceIds,
                '=ACTIVE' => 'Y',
            ],
            'order' => [
                'SORT' => 'ASC',
                'NAME' => 'ASC',
            ],
        ])->fetchAll();

        foreach ($services as $service) {
            $serviceNames[] = $service['NAME'];

            if (!empty($service['PROPERTY_MANAGER_EMAIL_VALUE'])) {
                $managerEmail[] = $service['PROPERTY_MANAGER_EMAIL_VALUE'];
            } else {
                $managerEmail[] = DEFAULT_EMAIL;
            }
        }

    }

    if (empty($managerEmail)) {
        $managerEmail[] = DEFAULT_EMAIL;
    }

    $managerEmail = array_values(array_unique($managerEmail));

    $name = $_POST['form_text_10'] ?? '';
    $phone = $_POST['form_text_11'] ?? '';
    $email = $_POST['form_email_12'] ?? '';
    $message = $_POST['form_textarea_13'] ?? '';

    $pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://')
        . $_SERVER['HTTP_HOST']
        . strtok($_SERVER['REQUEST_URI'], '?');

    $date = date('d.m.Y H:i:s');

    CFormResult::GetDataByID(
        $RESULT_ID,
        [],
        $formResult,
        $answerData
    );

    if (!empty($answerData['SIMPLE_QUESTION_236'])) {
        foreach ($answerData['SIMPLE_QUESTION_236'] as $fileAnswer) {
            if (!empty($fileAnswer['USER_FILE_ID'])) {
                $fileIds[] = (int)$fileAnswer['USER_FILE_ID'];
            }
        }
    }

    $mailFields = [
        'EVENT_NAME' => 'CONTACT_FORM_SERVICE_MANAGER',
        'LID' => SITE_ID,
        'C_FIELDS' => [
            'EMAIL_TO' => implode(',', $managerEmail),
            'NAME' => $name,
            'PHONE' => $phone,
            'EMAIL' => $email,
            'MESSAGE' => $message,
            'SERVICES' => implode(', ', $serviceNames),
            'PAGE_URL' => $pageUrl,
            'DATE_CREATE' => $date,
            'RESULT_ID' => $RESULT_ID,
        ],
    ];

    if (!empty($fileIds)) {
        $mailFields['FILE'] = $fileIds;
    }

    Event::send($mailFields);
}