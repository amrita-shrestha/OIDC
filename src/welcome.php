<!DOCTYPE html>
<html lang="en">
<body>
Welcome
<?php
    $params = parse_url($_SERVER[REQUEST_URI]);
    echo $params["query"];
?>


</body>
</html>