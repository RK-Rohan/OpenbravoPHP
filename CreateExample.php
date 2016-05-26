<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'Currency';
$data['active'] = 'true';
$data['iSOCode'] = 'OBB';
$data['symbol'] = '!';
$data['description'] = 'Openbravo Bucks';
$data['standardPrecision'] = '2';
$data['costingPrecision'] = '4';
$data['pricePrecision'] = '4';
$data['currencySymbolAtTheRight'] = 'true';
$response = $obws->Create($type, $data);
echo $response;
echo "\n";
echo 'Make a note of the newly created currency id.' . "\n" . 'Then do the update example using this id';
echo "\n";
echo "hello";
?>