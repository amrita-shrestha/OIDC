<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://localhost:9200',
    'xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69',
    'UBntmLjC2yYCeHwsyj73Uwo9TAaecAetRwMw0xYcvNL9yRdLSUi0hUAHfvCHFeFh'
);

$oidc->setRedirectURL('http://localhost/ProfessionalDevelopment/PHPOIDC/src/welcome.php');
//$oidc->setRedirectURL('https://ocis.owncloud.com/oidc-callback.html');
$oidc->addScope(["offline_access"]);
$oidc->setCodeChallengeMethod('S256');
$oidc->setResponseTypes(['id_token']);
$oidc->addAuthParam(['response_mode' => 'query']);
$oidc->setTokenEndpointAuthMethodsSupported(["client_secret_basic"]);

// Disable SSL certificate verification
// Required for local servers using https
$oidc->setVerifyHost(false);
$oidc->setVerifyPeer(false);
$oidc->authenticate();