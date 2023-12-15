<?php

namespace App\Controllers;

use App\Libraries\Server;

class Resource extends BaseController
{
    function __construct()
    {
        $server = new Server();
        $server->require_scope("userinfo node file"); //you can require scope here 
    }

    public function index()
    {
        @session_start();
        echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));
    }
}
