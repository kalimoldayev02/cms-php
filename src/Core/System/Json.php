<?php

namespace App\Core\System;

/**
 * Class Json
 * @package App\Core\System
 */
final class Json
{
    final public static function jsonEncode($value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    final public static function jsonDecode(string $value)
    {
        return json_decode($value);
    }
}