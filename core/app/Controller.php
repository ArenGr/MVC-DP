<?php

namespace Core\App;

class Controller
{
     protected function view() {
         return new View();
     }

     protected function renderJson($data) {
         $json = json_encode($data);
         header('Content-Type: application/json');
         echo $json;
         die();
     }
}
