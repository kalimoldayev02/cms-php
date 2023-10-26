<?php

namespace App\Core;

use App\Core\Database\DriverFactory;
use App\Core\Database\DriverInterface;

/**
 * Class Repository
 * @package App\Core
 */
class Repository
{
    protected DriverInterface $db;

    public function __construct()
    {
        $this->db = DriverFactory::make();
    }
}