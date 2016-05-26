<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'ADClient';
$params['where'] = "name like '%azaa%'";
$response = $obws->Query($type,$params);
echo $response;
echo "\n";
?>