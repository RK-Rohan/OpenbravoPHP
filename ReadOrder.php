<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'DataImportOrder';
$id = 'C397AF79248CD18401249DE690F7000C';
$response = $obws->Read($type, $id);
echo $response;
echo "\n";
echo "Don't get discouraged!" . "\n";
?>