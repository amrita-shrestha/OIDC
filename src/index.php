<!DOCTYPE html>
<html>
<head>
    <title>Button Example with OIDC Authentication</title>
</head>
<body>
<div class="button-container">
    <form action="oidc.php" method="post">
        <input type="submit" name="submit" value="Click Me for OIDC Authentication">
    </form>
</div>
<?php
//require '../vendor/autoload.php';
//
//use Jumbojett\OpenIDConnectClient;
//
//// Check if the button is clicked
//if (isset($_POST['submit'])) {
//    // Button clicked, perform OIDC authentication
//
//    // Set up the OIDC client
//    $oidc = new OpenIDConnectClient('https://localhost:9200/.well-known/openid-configuration', 'xdXOt13JKxym1B1QcEncf2XDkLAexMBFwiT9j6EfhhHFJhs2KM9jbjTmf8JBXE69', 'UBntmLjC2yYCeHwsyj73Uwo9TAaecAetRwMw0xYcvNL9yRdLSUi0hUAHfvCHFeFh');
//    // Perform authentication and redirect the user
//    $oidc->authenticate();
//    $oidc->getAccessToken();
//
//    // Request user info if needed
//    $userInfo = $oidc->requestUserInfo('sub');
//
//    // Process the user info as needed
//    var_dump($userInfo);
//
//}
//?>
</body>
</html>