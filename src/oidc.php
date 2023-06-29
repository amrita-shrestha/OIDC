<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://localhost:9200',
    'xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69',
    'UBntmLjC2yYCeHwsyj73Uwo9TAaecAetRwMw0xYcvNL9yRdLSUi0hUAHfvCHFeFh'
);

$oidc->setRedirectURL('http://localhost/ProfessionalDevelopment/PHPOIDC/src/welcome.php');
$oidc->addScope(["openid", "profile", "email", "offline_access"]);
$oidc->setCodeChallengeMethod('S256');
$oidc->setResponseTypes(['code']);
$oidc->addAuthParam(['response_mode' => 'query']);
$oidc->setTokenEndpointAuthMethodsSupported(["client_secret_basic"]);

// Disable SSL certificate verification
// Required for local servers using https
$oidc->setVerifyHost(false);
$oidc->setVerifyPeer(false);

echo $oidc->getTokenResponse();
try {
    $oidc->authenticate();
} catch(Exception $e){
    echo $e;
}

// Client
// https://localhost:9200/signin/v1/identifier?
// client_id=xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69
// flow=oidc
// redirect_uri=http%3A%2F%2F127.0.0.1%3A43427
// response_type=code
// scope=openid+offline_access+email+profile
// state=DKb88ZnCAnmHR7AwXTmbvsSUq4NN_fUGku5yMh71ces%3D
// code_challenge=o52QI5bcOAdSv7MVKXtgfbT8FG7DIPgoiCkgOV6o1IU
// code_challenge_method=S256
// prompt=select_account+consent

// Demo
// https://localhost:9200/signin/v1/identifier?
// client_id=xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69
// flow=oidc
// redirect_uri=https%3A%2F%2Fgithub.com
// response_type=code
// scope=openid+email+profile
// state=cb364ec953bce0ea0e8bb76f3fb5db97
// nonce=27b2d66dcd3c6662e76d3fb2c17f48fc

// Web
// https://localhost:9200/signin/v1/identifier?
// client_id=web
// flow=oidc
// redirect_uri=https%3A%2F%2Flocalhost%3A9200%2Foidc-callback.html
// response_type=code
// response_mode=query
// code_challenge=iBniYNzCc0rDjwZzxN9IPriHoWYcF9c5Yi552XweuKQ
// code_challenge_method=S256
// scope=openid+profile+email
// state=e164262854824054ae3626476bc0429d

//{
//    "params": [
//    "admin",
//    "admin",
//    "1"
//],
//    "hello": {
//    "prompt": "select_account consent",
//        "scope": "openid offline_access email profile",
//        "client_id": "xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69",
//        "redirect_uri": "http://127.0.0.1:43427",
//        "flow": "oidc"
//    },
//    "state": "94fdf95dd7fdc5af"
//}

//{
//    "params": [
//    "admin",
//    "admin",
//    "1"
//],
//    "hello": {
//    "prompt": "select_account consent",
//        "scope": "email profile openid",
//        "client_id": "xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69",
//        "redirect_uri": "https://github.com",
//        "flow": "oidc"
//    },
//    "state": "75860c8e139300eb"
//}

// code=vPeT51XELryM4f4TrCoo_Sl8qch43ucI
// scope=openid%20email%20profile
// session_state=ff21a285d66b919a7d985a335f2f42ee1739f8bf333b01e2d13802400d3ff521.jTQOJ7vTUr4uXXwHBIuNI8VKodLKQeqFyKBQIulr9nk
// state=a38b3b55502e6238cd314048de49b543

// token = eQWIZXlKaGJHY2lPaUpRVXpJMU5pSXNJbXRwWkNJNkluQnlhWFpoZEdVdGEyVjVJaXdpZEhsd0lqb2lTbGRVSW4wLmV5SmhkV1FpT2lKNFpGaFBkREV6U2t0NGVXMHhRakZSWTBWdVkyWXlXRVJyVEVGbGVFMUNSbmRwVkRscU5rVm1hR2hJUmtwb2N6SkxUVGxxWW1wVWJXWTRTa0pZUlRZNUlpd2laWGh3SWpveE5qZzNNRGt3TlRRMUxDSnFkR2tpT2lKTlRHSmtXbEJ1VlhoMlNEbDNSa2RZUWtSVFdsZEhTaTFuYzBSeVNVZGtRaUlzSW1saGRDSTZNVFk0TkRRNU9EVTBOU3dpYVhOeklqb2lhSFIwY0hNNkx5OXNiMk5oYkdodmMzUTZPVEl3TUNJc0luTjFZaUk2SW5CclRETnNUbU5CTTFVNWIzTlJWVXBBU2xGUWF6ZEJWa2hzYkdwaE5ERkdSWFp4WDJveVNGVlNUazVxTVRONVpIRlNhRkZwYmxwTUxXMUtRWGhyYTAxbFgwMHdhbTVETVMweVRpMDJhVlp2VVZsdVgxUkRRU0lzSW14bkxuUWlPaUl5SWl3aWMyTndJam9pYjNCbGJtbGtJRzltWm14cGJtVmZZV05qWlhOeklHVnRZV2xzSUhCeWIyWnBiR1VpTENKc1p5NXlJam9pWmpOWGFXOXljMmRZTlhnNE5EZHZYek53Y0doUWNUaHBTV3BaUWtkdVJuTllVamhGUmpWb2FYa3lSU0lzSW14bkxta2lPbnNpWkc0aU9pSkJaRzFwYmlJc0ltbGtJam9pYjNkdVEyeHZkV1JWVlVsRVBUZ3pOREl4WXpnNExUUm1NbU10TkRJME5TMWlOV1UwTFRoa1pUQmxPV0poWlRRell5SXNJblZ1SWpvaVlXUnRhVzRpZlN3aWJHY3VjQ0k2SW1sa1pXNTBhV1pwWlhJdGJHUmhjQ0o5LlZrRFd2NVlzdE5jdk1JeGlrTm1Ud21zZHBZSFpwWDFfVjZSYVBiS19URlpPblhxSzB1dVB6Q3FTaUpYVnpKN2k1a05rUWQxXzFnYUNySHE3ZkxDejA5T1RHSzNIdlVjMUR6SjlEd0FqVk5nV3JYbFhNLUl5alJVZnZ6aDlkU3AtNFMydUYtY0w3V2EyQ0dkRlZpek1WTElxbEVRSEFEblh4eTVybHJMTzlEYms2WXZGSk10SFRwUzh0UmdVa29COE8xSFV6bkd6RVR6LTU5aC1MSER6X2ZmT0wwYWtwN0YyYjJ6OVJocm5rcVdFU2tuMHdVWXVIMm5pTy0xaHc4SXdjNmE2bXA1eE11S0N0dURhekxDbVFqMXNmYXRmYmpiQTB6Uzl5cTRsTFp6TXFIWkFzWUM0RmZ2WmU0YjB1aVNNdEZRMk5CcE9hSkI0TkJ6YlZGbU9LT19DR1VVM0xCVG9uWC1zdGR0S242bXdacHB3aWZuM3loa191amF4Tnc0QXJ3OFF2OUpqbXhYV0ZFSkZKUnBXNno1eU9xbjhJVUtGS3FxWEdlSUNhNkFqanFiZ052LU9qbkk5Zk42VFRDVFdwbzdlbG92Vkt5ZThVYTFNdE84UDlQS2NTQVFlWFNPUWhQR0hTTHlwMHpjVDRoOGR6ZmRUSzV3dlVCZmtuRWZScW5EbjlKbnpWNWhEeXdaVDM2aFp3eWx4MWhhY01fNUc5eUVwQkZYR2lPYXM2bkk3SXkyU3gyMDJXR0YzQWd6c2o2VGlLeXduWEVEdjk5VGIyRFJYb2tIRm5ocG1UQXNsREFGaVJJNXpQb0VIRU5QdS1kNGk1RDRQaTlEejhtQWdkREJjal9GRVJDTE5QZGNQUjJsVEpaUGFqWjNaLXhSWGw0cS1oenpPVjZn