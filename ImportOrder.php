<?php
$basedir = dirname(dirname(__FILE__)) . '/includes/';
require_once($basedir . 'settings.php');
require_once($basedir . 'obws.php');
$obws = new OpenbravoWS();
$type = 'DataImportOrder';
$data['active'] = 'true';
$data['processNow'] = 'OBB';
$data['priceList'] = '2';
$data['currency'] = 'USD';
$data['shippingCompany'] = 'FedEx';
$data['addressLine1'] = '1529 Grenoside Ave';
$data['postalCode'] = '12309';
$data['cityName'] = 'Schenectady';
$data['contactName'] = 'Marla Holmes';
$data['email'] = 'marla.the.dog@gmail.com';
$data['phone'] = '5188914148';
$data['salesOrder'] = 'EX1';
$data['sKU'] = 'WIDGET1';
$data['salesOrderLine'] = '1';
$data['orderedQuantity'] = '2';
$data['unitPrice'] = '5';
$data['orderReferenceNo'] = 'EX1';
$response = $obws->Create($type, $data);
echo $response;
echo "\n";
echo "Don't get discouraged!" . "\n";
?>