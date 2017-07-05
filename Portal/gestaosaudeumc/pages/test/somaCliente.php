<?php
require_once "../../libs/nusoap/lib/nusoap.php";
//$client = new nusoap_client("http://localhost/nusoap/productlist.php");
$client = new nusoap_client("somaws.wsdl", true);

//$client->soap_defencoding = 'utf-8'; 
$client->soap_defencoding = 'ISO-8859-1'; 
//'ISO-8859-1'
$client->encode_utf8 = false;
$client->decode_utf8 = false;

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$result = $client->call("getSoma", "9_3");

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Books</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}

