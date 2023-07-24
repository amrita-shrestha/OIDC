<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

//var_dump($_REQUEST);
//$oidc = new OpenIDConnectClient('https://localhost:9200',
//    'xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69',
//    'UBntmLjC2yYCeHwsyj73Uwo9TAaecAetRwMw0xYcvNL9yRdLSUi0hUAHfvCHFeFh'
//);
//$oidc->setRedirectURL('http://localhost/ProfessionalDevelopment/PHPOIDC/src/welcome2.php');
//$oidc->setVerifyHost(false);
//$oidc->setVerifyPeer(false);

//global $token;
    $params = parse_url($_SERVER[REQUEST_URI]);
    parse_str($params["query"], $output);
    echo "<pre>";
    var_dump($output);
    echo $output['access_token'];
echo "</pre>";
//try {
//    $oidc->authenticate();
//} catch(Exception $e){
//    echo $e;
//}

?>
