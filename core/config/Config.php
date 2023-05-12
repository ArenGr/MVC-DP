<?php

namespace Core\Config;

class Config
{
    /**
     * @var array
     */
    private static array $config = array();

    /**
     * @param $key
     * @return array|mixed|null
     */
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

    /**
     * @param $key
     * @return array|mixed|null
     */
    public static function get($key)
    {
        if (empty(self::$config)) {
            self::$config = require_once(APP_ROOT . '/config/config.php');
        }

        return self::handle($key);

    }
}
