<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'Currency';
$id = 'C397AF79248CD18401249CA4A3A8000B';
$response = $obws->Delete($type, $id);
echo $response;
echo "\n";
echo 'You get a gold star!';
echo "\n";
?>