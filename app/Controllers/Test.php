<?php
namespace App\Controllers;

class Test extends BaseController
{

  function index()
  {
    @session_start();
    echo view("oauth2/api");
  }

  function requesttoken()
  {
    $url = 'https://localhost:8080/openapi/v1.0/access-token/b2b';
    $apiCredential = 'b66925de-d8ec-476e-a170-6cf06c863b78';
    $apiCredentialSecret = 'efc71ced-b0e7-4b47-8270-3c24829764aa';

    $privateKey = <<<EOD
-----BEGIN PRIVATE KEY-----
MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC1q0icxg2vgljuXjpIPpUnWAL9NsRWtFMV4FFHrS2iC/1S7D8M1n1b9di7C5TYvNqcolItLhA06XMgm7VF61pZHi8CCiymWza9PvU79DfC9WNFdBpgSxai4dFCVxYAM8du3VcflT4qYPbQvHVYdyzCAEl2/6fecVskp3Jypvs
ZvmaOs53PFdIpoEQIcF3YK+Xg4WGikNEugGnOFSgo60Wd96Js6Ro4QNdgmUPl7uvrHJ6bSncN/Ilwf1eLGL6bU04lgMFmHwKdIAaEQuZYLjMN1pNoCLDFFdJ/YAUoy03604V/IXNiKRgrR9uGSI8KYF7wJNn0y76c6X6Dpb8fa+/DAgMBAAECggEBAJf8hdJLS/XS2m4KPT5lxUlWM6H+qMJVON
GrirSpqOzSlQxEA/fMlrJR+xF5ffzZ+xdiIdgUmpB54sycGEs3vK2kN/W/510CIMixHGAdUG11+KiJmuuGxphczkJvM0PWDfqtiQ8uQAUafENj99ScV8CylsPM3XeXZIZE5NYQ5zDAFVgY5a8DuhHaIJI19jdmP4nb1S7CFylRIQ8PGA+kU/hB5TUZXhtr6Iv2nRNcM01wev6AB8gz0qI9pOkLA
gSIPnfBDl9gIpVWtt4tWedWoXR3W59KIgG1p6YIb/lDAeJSS+nYV4dbs+1zh5Lhl5WyanA1bqQoU1T+VEEx9xb8v/ECgYEA6nPkl7ezmjdrpin/vLQ8E9yyqI2sqw7kIv4AqLKiaKIS5pkZ/3jv9fLXNDlOz2MPPThefHWxv4Il/Cbf6JkCuJ71yajNCLw0OLiYJSYGC1Nuj4buG6oWOdI/xYAL
eEfdvnu1atkgGMHx1xhreuspl3gGGIp85I6qf89/o8aMetsCgYEAxl2E5OUMnGORxshF/7l8FEw/bIxaQNLt2RkrOfDiDpSm3dBCASSnN2MDh9eTKTpy5KSnGX0uRVt/FRJ8XUTtVEQeSkD8QvraCFA9RPtNXlsQn7hhpOk1iVEHQB9xESdCya3B7ab42vzGBMXSwf8XQMcioa1JLmaYfFYc6E4
hTzkCgYEAqV9aB+TVIhbhdOQodTm7oRmyE6Rt1hHm7ASVk0mhnHdhsiduqanDqOlrYLX54kaM7sw3LjCUXWZ3bIblARLw7VEg/TMuFB5ql4N7nnKusSXv3E48281vSwxBt7s+DgHVBtQ2Bl+fGWObA6oHk4ApxtwVg0sg2LjcIYNUkYtRVzsCgYAkVI55aaX0opvZX2bKnksmYIyhMdd51efwAh
cTppWQfBNPvsvH79GcaEsGPypZu7W9QJbGKVInK8nLrzYN0wjwjQVLLjnFfrIeIawHDUuvQ1h5GEjx7jB69NcyHFAWBy3JSESjZRhg6zjNOPoPw8ubdp1WJSmpEOtOomrq9RxOqQKBgQDS2Z1PvHLaAzkWkKTwRMprbvYm/EYchvQRiY6OKWBVUEzuFfw2n/oI+yDr9PVwC2jjMMrsHXC86afxB
y8n6LJ6Wf4DaZvigpbmDOxPGzBHExriuQKm6aQEOqKL4afiY7Ex1HdnlE3HYm9qp/MRgWaNtBb0P3d6BpRtDXeT0Flx+A==
-----END PRIVATE KEY-----
EOD;

    $publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtatInMYNr4JY7l46SD6VJ1gC/TbEVrRTFeBRR60togv9Uuw/DNZ9W/XYuwuU2LzanKJSLS4QNOlzIJu1RetaWR4vAgospls2vT71O/Q3wvVjRXQaYEsWouHRQlcWADPHbt1XH5U+KmD20Lx1WHcswgBJdv+n3nFbJKdycqb7Gb5mjrO
dzxXSKaBECHBd2Cvl4OFhopDRLoBpzhUoKOtFnfeibOkaOEDXYJlD5e7r6xyem0p3DfyJcH9Xixi+m1NOJYDBZh8CnSAGhELmWC4zDdaTaAiwxRXSf2AFKMtN+tOFfyFzYikYK0fbhkiPCmBe8CTZ9Mu+nOl+g6W/H2vvwwIDAQAB
-----END PUBLIC KEY-----
EOD;

    // '2017-03-17T09:44:18+07:00';
    $timestamp = time();
    $formattedTimestamp = date('c', $timestamp);


    $body = json_encode(array(
      'grantType' => 'client_credentials',
    ));

    $string2Sign = "$apiCredential|$formattedTimestamp";
    $securedHash = $this->SHA256withRSA($privateKey, 'b66925de-d8ec-476e-a170-6cf06c863b78|2017-03-17T09:44:18+07:00');

    $headers = array(
      // 'Content-Type: application/json',
      "X-CLIENT-KEY: $apiCredential",
      "X-SIGNATURE: $securedHash",
      "X-TIMESTAMP: " . strval($formattedTimestamp),
    );

    dd($string2Sign, $headers);

    // $ch = curl_init($url);

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Set the request method (GET, POST, PUT, DELETE, etc.)
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // $response = curl_exec($ch);

    // if (curl_errno($ch)) {
    //   echo 'Curl error: ' . curl_error($ch);
    // }

    // // Close cURL session
    // curl_close($ch);

    // // Process the response
    // echo 'Response: ' . $response;
  }

  private function SHA256withRSA($privateKey, $message)
  {
    $privateKeyResource = openssl_pkey_get_private($privateKey);

    if ($privateKeyResource === false) {
      die('Unable to load private key');
    }

    $signature = null;
    openssl_sign($message, $signature, $privateKeyResource, OPENSSL_ALGO_SHA256);
    openssl_free_key($privateKeyResource);

    $base64Signature = base64_encode($signature);
    return $base64Signature;
  }

}
