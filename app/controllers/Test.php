<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class Test extends Controller
{
    public function run() {
        $a = new User();
        $b = $a->getAllUsers();
//        $users = $db->row("Select * from users");
        var_dump($b);
    }

}