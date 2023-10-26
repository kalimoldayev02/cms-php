<?php

namespace App\Core\System;

/**
 * Class Util
 * @package App\Core\System
 */
class Util
{
    public static function passHash(string $password): string
    {
        return md5($password . 'A7#4nN7_0@c.jk^788');
    }
}