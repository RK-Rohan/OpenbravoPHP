<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'Currency';
$id = 'C397AF79248CD18401249CA4A3A8000B';
$data['standardPrecision'] = '4';
$response = $obws->Update($type, $id, $data);
echo $response;
echo "\n";
echo 'When you are finished having fun making bogus currencies do the delete example';
echo "\n";
?>