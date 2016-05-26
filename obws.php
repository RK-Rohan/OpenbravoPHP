<?php
require_once('settings.php');
class OpenbravoWS {
  var $serviceUrl;
  var $userpwd;

public function OpenbravoWS() {
  $this->serviceUrl = BASEURL;
  $this->userpwd = USERPASS;
}


public function SetCurlOptions($method, $tail, $body = NULL){
  $header[] = 'Content-Type: text/xml';
  $url = $this->serviceUrl . '/' . $tail;
  $curlOptions[CURLOPT_URL] = $url;
  $curlOptions[CURLOPT_RETURNTRANSFER] = true;
  $curlOptions[CURLOPT_HTTPHEADER] = $header;
  $curlOptions[CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;
  $curlOptions[CURLOPT_TIMEOUT] = 900;
  $curlOptions[CURLOPT_CUSTOMREQUEST] = $method;
  $curlOptions[CURLOPT_USERPWD] = $this->userpwd;
  if($method == 'POST' || $method == 'PUT'){
    $curlOptions[CURLOPT_POSTFIELDS] = $body;
    }
  return $curlOptions;
  
}


public function CallOpenbravo($method, $tail, $body = NULL) {
  $curlOptions = $this->SetCurlOptions($method, $tail, $body);
  $ch = curl_init();
  curl_setopt_array($ch, $curlOptions);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

public function GenerateRequestBody($type, $data, $id = NULL){
  $sxe = new SimpleXMLElement('<ugly></ugly>');
  $xml = $sxe->addChild($type);
  if(isset($id)){
    $xml->addAttribute('id',$id);
  }
  foreach($data as $key=>$value){
    $xml->addChild($key, $value);
  }
  $xmlstr = '<?xml version="1.0" encoding="UTF-8"?>';
  $xmlstr .= '<ob:Openbravo xmlns:ob="http://www.openbravo.com">';
  $xmlstr .= $xml->asXML();
  $xmlstr .= '</ob:Openbravo>';
  return $xmlstr;
}

public function urlEncode($value){
  $exceptions = array('+', "'", ',');
  foreach($exceptions as $value){
    $codes[] = rawurlencode($value);
  }
  str_replace($codes, $exceptions, rawurlencode($value));
}


public function getParametersAsString(array $parameters) {
$queryParameters = array();
foreach ($parameters as $key => $value) {
  $queryParameters[] = $key . '=' . $this->urlEncode($value);
}
return implode('&', $queryParameters);
}

public function Create($type, $data){ 
  $body = $this->GenerateRequestBody($type,$data);
  $method = 'POST';
  $response = $this->CallOpenbravo($method, $type, $body);
  return $response;
}

public function Update($type, $id, $data){
  $body = $this->GenerateRequestBody($type, $data, $id);
  $response = $this->CallOpenbravo('PUT', $type, $body);
  return $response;
}

public function Upload($filePath){
  $body = file_get_contents($filePath);
  $tail = '';
  $response = $this->CallOpenbravo('PUT',$tail,$body);
}

public function Delete($type, $id){
  $tail = $type . '/' . $id;
  $response = $this->CallOpenbravo('DELETE', $tail);
  return $response;
}

public function Read($type, $id){
  $tail = $type . '/' . $id;
  $response = $this->CallOpenbravo('GET', $tail);
  return $response;
}

public function Query($type,$queryParams){
  $queryString = $this->getParametersAsString($queryParams);
  $tail = '/' . $type . '?' . $queryString;
  $response = $this->CallOpenbravo('GET',$tail);
  return $response;
}


}

?>