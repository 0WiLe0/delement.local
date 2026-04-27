<?php
namespace lib\EventServices;

use Bitrix\Main\Loader;

class AuthHistoryLogger
{
    /***
     * Сохранять в инфоблок историю входа пользователей в систему
     *
     * @param array $result
     * @return void
     */

    public static function handleLogin(array $result): void
    {
        if (!Loader::includeModule('iblock')) {
            return;
        }

        $logger = new self($result);
        $logger->save();
    }

    private function __construct(private array $result)
    {
    }

    private function save(): void
    {
        $element = new \CIBlockElement();

        $element->Add([
            'IBLOCK_ID' => IBLOCK_ID_AUTH,
            'NAME' => $this->makeNameIblock(),
            'ACTIVE' => 'Y',
            'PROPERTY_VALUES' => $this->makeProperties(),
        ]);
    }

    private function isSuccess(): bool
    {
        return $this->result['RESULT_MESSAGE'] === true
            || $this->result['RESULT_MESSAGE'] === 1;
    }

    private function makeProperties(): array
    {
        $data = [
            'AUTH_DATETIME' => date("Y-m-d H:i:s"),
            'STATUS' => $this->isSuccess() ? 'Успешно' : 'Ошибка',
        ];

        if ($this->isSuccess()) {
            $data['USER_LINK'] = $this->result['USER_ID'] ?? null;
        } else {
            $data['ERROR_TEXT'] = strip_tags($this->result['RESULT_MESSAGE']['MESSAGE'] ?? '');
            $data['LOGIN_INPUT'] = $this->result['LOGIN'] ?? '';
            $data['PASSWORD_MASKED'] = $this->maskPassword($this->result['PASSWORD'] ?? '');
        }

        return $data;
    }

    private function makeNameIblock(): string
    {
        return 'Авторизация [' . ($this->isSuccess() ? 'Успешно' : 'Ошибка') . '] ' . ($this->result['LOGIN'] ?? '') . ' ' . date('d.m.Y H:i:s');
    }

    private function maskPassword(string $password): string
    {
        return str_repeat('*', mb_strlen($password));
    }
}