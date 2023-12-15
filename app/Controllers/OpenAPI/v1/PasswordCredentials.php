<?php

namespace App\Controllers\OpenAPI\v1;

use App\Libraries\Server;
use App\Controllers\BaseController;

class PasswordCredentials extends BaseController
{
	function index()
	{
		@session_start();
		$server = new Server();
		$server->password_credentials();
	}
}
