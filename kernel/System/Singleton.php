<?php

namespace App\Kernel\System;

/**
 * Description of Singleton
 *
 * @author Alisher Kalimoldayev <kalimoldayev02@gmail.com>
 */
trait Singleton
{
    protected static ?self $instance = null;

    private function __construct()
    {
    }

    private function __clone(): void
    {
    }

    protected static function execute()
    {
    }

    public static function getInstance(): static
    {
        if (!self::$instance) {
            self::$instance = new static();
        }

        self::execute();
        return self::$instance;
    }
}