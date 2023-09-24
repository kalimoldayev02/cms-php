<?php

namespace App\Kernel\View;

/**
 * класс для вызова представлений в контроллере
 */
class View
{
    public function page(string $name): void
    {
        $path = APP_PATH . "/views/pages/{$name}.php";
        if (file_exists($path)) {
            extract([
                'view' => $this
            ]);
            include_once $path;
            return;
        }

        throw new \Exception("View $name not found");
    }
    public function component(string $name): void
    {
        $path = APP_PATH . "/views/components/{$name}.php";
        if (file_exists($path)) {
            include_once $path;
            return;
        }
        echo "Component <b>$name</b> not found";
    }
}