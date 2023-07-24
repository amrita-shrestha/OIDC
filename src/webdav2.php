<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Sabre\DAV\Client;
$settings = [
    'baseUri'  => 'https://localhost:9200/remote.php/webdav/',
    'userName' => 'admin',
    'password' => 'admin',
];
$newDirectoryName = "Testing";
// Creating the client
$client = new Client($settings);

$client->addCurlSetting(CURLOPT_SSL_VERIFYHOST,0);
$client->addCurlSetting(CURLOPT_SSL_VERIFYPEER,0);

$response = $client->request('MKCOL', "Parent");
//$response = $client->request('PROPFIND', '');
//$response = $client->request('PUT', 'file.txt', "New contents");

//if ($response['statusCode'] === 201) {
//    echo 'Directory created successfully.';
//} else {
//    echo 'Failed to create directory. HTTP status code: ' . $response['statusCode'];
//}
print_r($response["statusCode"]);