<?php

namespace App\System;

class Session
{
    use Singleton;

    protected static function execute()
    {
        session_start();
    }

    public function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function getFlash(string $key, $default = null)
    {
        $result = $_SESSION[$key] ?? $default;
        $this->remove($key);
        return $result;
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }
}