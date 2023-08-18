<?php
$params = parse_url($_SERVER[REQUEST_URI]);
parse_str($params["query"], $output);
echo "<pre>";
var_dump($output);
echo $output['access_token'];
echo "</pre>";

?>
