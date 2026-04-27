<?php

namespace lib\EventServices;

use Bitrix\Main\Mail\Event;



class FormMailer
{
    /***
     * Отправка письма ответственному/ответственным
     *
     * @param array $data
     * @return void
     */

    public static function handle(array $data): void
    {
        $mailer = new self($data);
        $mailer->send();
    }
    private function __construct(private array $data)
    {
    }

    private function send(): void
    {
        $fields = $this->prepareFields();

        $mailFields = [
            'EVENT_NAME' => 'CONTACT_FORM_SERVICE_MANAGER',
            'LID' => SITE_ID,
            'C_FIELDS' => [
                'EMAIL_TO' => $this->formatEmails(),
                'NAME' => $fields['NAME'],
                'PHONE' => $fields['PHONE'],
                'EMAIL' => $fields['EMAIL'],
                'MESSAGE' => $fields['MESSAGE'],
                'SERVICES' => $fields['SERVICES'],
                'PAGE_URL' => $fields['PAGE_URL'],
                'DATE_CREATE' => $fields['DATE_CREATE'],
                'RESULT_ID' => $fields['RESULT_ID'],
            ],
        ];

        if (!empty($this->data['FILES'])) {
            $mailFields['FILE'] = $this->data['FILES'];
        }

        Event::send($mailFields);
    }

    private function prepareFields(): array
    {
        return [
            'EMAIL_TO' => $this->data['EMAIL_TO'] ?? '',
            'NAME' => $this->data['NAME'] ?? '',
            'PHONE' => $this->data['PHONE'] ?? '',
            'EMAIL' => $this->data['EMAIL'] ?? '',
            'SERVICES' => $this->formatServices(),
            'MESSAGE' => $this->data['MESSAGE'] ?? '',
            'PAGE_URL' => $this->data['PAGE_URL'] ?? '',
            'RESULT_ID' => $this->data['RESULT_ID'] ?? '',
            'DATE_CREATE' => $this->data['DATE_CREATE'] ?? date('d.m.Y H:i:s'),
        ];
    }

    private function formatEmails(): string
    {
        $emails = $this->data['EMAIL_TO'] ?? [];

        if (is_array($emails)) {
            return implode(',', $emails);
        }

        return (string)$emails;
    }

    private function formatServices(): string
    {
        $services = $this->data['SERVICES'] ?? [];

        if (is_array($services)) {
            return implode(', ', $services);
        }

        return (string)$services;
    }
}