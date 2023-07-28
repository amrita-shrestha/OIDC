<?php
namespace Amrita;

require_once(__DIR__ . "/../vendor/autoload.php");

$auth = Ocis::getInstance();

// If the form was submitted, call the authenticate method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->getAuth();
//    try {
//        $auth->getAuth();
//        $access_token = $auth->getAccessToken(); // This is where the access token is generated using the Auth code received by clicking on `Allow`
//        $refresh_token = $auth->getRefreshToken();
//        var_dump($access_token,$refresh_token);// Also receive the refresh token
//
//    } catch (Exception $e) {
//        echo $e->getMessage();
//    }
}
try {
    $auth->getAuth();
    $tok = $auth->getAccessToken();
    echo $tok;
    $ref = $auth->getRefreshToken();
    echo $ref;
}catch (Exception $e) {
//    echo $e->getMessage;
}

