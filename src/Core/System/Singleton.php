<?php

namespace App\Core\System;

/**
 * Trait Json
 * @package App\Core\System
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