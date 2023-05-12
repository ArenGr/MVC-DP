<?php

namespace Core\Config;

class Config
{
    private static array $config = array();

    private static function handle($key)
    {
        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $key) {
            if (array_key_exists($key, $value)) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }

    public static function get($key)
    {
        if (empty(self::$config)) {
            self::$config = require_once(APP_ROOT . '/config/config.php');
        }

        return self::handle($key);

    }
}
