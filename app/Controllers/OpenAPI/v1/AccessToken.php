<?php

namespace App\Controllers\OpenAPI\v1;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class AccessToken extends BaseController
{
    use ResponseTrait;

    public function b2b()
    {
        $httpErrorCode = 400;
        $errorCode = '4007300';
        $errorMessage = 'Invalid field format [clientId/clientSecret/grantType]';

        // Handle different HTTP error codes
        switch ($httpErrorCode) {
            case 400:
                return $this->respond([
                    'responseCode' => $errorCode,
                    'responseMessage' => $errorMessage,
                ], 400);

            case 401:
                return $this->respond([
                    'responseCode' => $errorCode,
                    'responseMessage' => $errorMessage,
                ], 401);

            case 501:
                return $this->respond([
                    'responseCode' => $errorCode,
                    'responseMessage' => $errorMessage,
                ], 501);

            default:
                return $this->respond([
                    'responseCode' => $errorCode,
                    'responseMessage' => $errorMessage,
                ], $httpErrorCode);
        }
    }

}
