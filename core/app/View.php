<?php

namespace Core\App;

use Exception;

use Core\Config\Config;

class View
{
    public array $data = [];

    public function render(string $view, array $params = [])
    {
        $path = $this->getPath($view);

        if (file_exists($path)) {
            $this->data = $params;

            return require_once($path);
        }
        throw new Exception("Can not find view: {$path}");
    }

    private function getPath(string $view): string
    {
        $view = str_replace('.', DIRECTORY_SEPARATOR, $view);
        $path = Config::get('paths.views');
        return "{$path}/{$view}.php";
    }
}
