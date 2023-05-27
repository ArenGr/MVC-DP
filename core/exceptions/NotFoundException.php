<?php

namespace Core\Exceptions;

use Core\Config\Config;

class NotFoundException
{
    public static function throw()
    {
        http_response_code(404);
        include(Config::get('paths.views') . '/errors/404.php');
        exit;
    }
}