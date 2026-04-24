<?php

namespace lib\Helpers;
class TextHelper {
    /**
     * Возвращает заданное количество слов у текста
     *
     * @param string $text
     * @param int $count
     * @return string
     */
    public static function textResize(string $text, int $count): string
    {
        if (empty($count)) {
            $count = 15;
        }

        $text = preg_split('/\s+/', strip_tags($text));
        $text = array_filter(array_map('trim', $text));
        $text = array_slice($text, 0, $count);
        return implode(" ", $text);
    }

}


